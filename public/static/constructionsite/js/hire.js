$(function(){
    //添加选中物品的按钮
    $('#form_group_materials_list').after('<div class="form-group col-md-12 col-xs-12" id="form_group_select"><button class="btn btn-xs btn-info" type="button" id="select">选择物品</button></div>');
    //编辑获取
    var pid = $("#id").val();

    var materials_list = $("#materials_list").val();
    console.log(pid)
    $("#old_plan_list").val($("#materials_list").val());
   
   //获取当前文件路径
  	var a =window.location.pathname
  	//判断是哪个就请求哪个路径下的tech方法
	if(a.indexOf('hirecontract')===-1)
	{
		if(pid){
		  $.ajax({
	        type: "GET",
	        async: false,
	        url: "/admin.php/constructionsite/hire/tech/pid/"+pid+"/materials_list/"+materials_list,
	        success: function(data){
	            $("#form_group_select").after(data);
	              if(data){
	        			$('#select').hide(); 
	        		}
	        }
		    });
		}
	}else{
		if(pid){
		  $.ajax({
	        type: "GET",
	        async: false,
	        url: "/admin.php/constructionsite/hirecontract/tech/pid/"+pid+"/materials_list/"+materials_list,
	        success: function(data){
	            $("#form_group_select").after(data);
	              if(data){
	        			$('#select').hide();
	        		}
	        }
		    });
		}
	}
  
	
  
    //点击选择物品弹出
    $('#select').click(function(){
        var materials = $("#materials_list").val();
        console.log(materials)
        //iframe窗
        layer.open({
            type: 2,
            title: '选择子件',
            shadeClose: true,
            shade: 0.3,
            maxmin: true, //开启最大化最小化按钮
            area: ['70%', '70%'],
            content: '/admin.php/constructionsite/hirecontract/choose_materials/materials/'+materials
        });
    });
    //没有数据了选择按钮消失
    if($('tbody tr:first').hasClass('table-empty')){
        $('#pick').hide();
    }
    //点击选择
    $('#pick').click(function(){
        var chk = $('tbody .active');
        var ids = '';
        if($("#form_group_materials_name",parent.document).length>0){
            var html = '';
            chk.each(function(){
                ids += $(this).find('.ids').val()+',';
                html += '<tr><input type="hidden" name="mid[]" value="'+$.trim($(this).find('td').eq(1).text())+'"><td>'+$.trim($(this).find('td').eq(2).text())+'</td><td>'+$.trim($(this).find('td').eq(4).text())+'</td><td>'+$.trim($(this).find('td').eq(3).text())+'</td><td><input class="xysl"  type="number" name="xysl[]" oninput="inp($(this))"></td><td><input type="text" name="sdate[]"></td><td><input type="text" name="edate[]"></td><td><input type="text" name="hire_day[]"></td><td><input type="text" name="bz[]"></td><td><a href="javascript:;" onclick="delMaterials(this,\''+$.trim($(this).find('td').eq(1).text())+'\')">删除</a></td></tr>';
            });
        }else{
            var html = '<div class="form-group col-md-12 col-xs-12" id="form_group_materials_name"><table class="table table-bordered"><tbody><tr><td>租赁物品</td><td>单位</td><td>规格型号</td><td>需用数量</td><td>单价</td><td>计划进场日期</td><td>计划退场日期</td><td>租赁天数</td><td>小计</td><td>操作</td></tr>';
            chk.each(function(){
                ids += $(this).find('.ids').val()+',';
                html += '<tr><input type="hidden" name="mid[]" value="'+$.trim($(this).find('td').eq(1).text())+'"><input type="hidden" name="mlid[]" value="0"><td>'+$.trim($(this).find('td').eq(2).text())+'</td><td>'+$.trim($(this).find('td').eq(4).text())+'</td><td>'+$.trim($(this).find('td').eq(3).text())+'</td><td><input class="xysl" type="number" oninput="inp($(this))" name="xysl[]"></td><td><input oninput="inp1($(this))" class="ckjg" type="number" name="ckjg[]"></td><td><input class="sdate" type="date" onchange="changedate(this)" name="sdate[]"></td><td><input class="edate" onchange="changedate(this)" type="date" name="edate[]"></td><td><input class="hire_day" type="text" name="hire_day[]"></td><td><input class="xj" type="number" name="xj[]"></td><td><a href="javascript:;" onclick="delMaterials(this,\''+$.trim($(this).find('td').eq(1).text())+'\')">删除</a></td></tr>';
            });
            html += '</tbody></table></div>';
        }
        ids = ids.slice(0,-1);
        //获取选中物品的id逗号隔开
        if(ids){
            var materials = $("#materials_list",parent.document).val();
            if(materials){
                ids = materials+','+ids;
            }
            var idsArr=ids.split(",");
            idsArr.sort();
            idsArr = $.unique(idsArr);
            ids = idsArr.join(",");
            console.log(ids)
            $("#materials_list",parent.document).val(ids);
            if($("#form_group_materials_name",parent.document).length>0){
                $("#form_group_materials_name tbody",parent.document).append(html);
            }else{
                $("#form_group_select",parent.document).after(html);
            }

        }
        //当你在iframe页面关闭自身时
        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); //再执行关闭
    });
});
var removeFromArray = function (arr, val) {
    var index = $.inArray(val, arr);
    if (index >= 0)
        arr.splice(index, 1);
    return arr;
};

function delMaterials(obj,id){
    var ids = $("#materials_list").val();
    var idsArr=ids.split(",");
    ids = removeFromArray(idsArr, id);
    ids = idsArr.join(",");
    $("#materials_list").val(ids);
    $(obj).parents('tr').remove();
}

function get_date(){
					    App.initHelpers(["datepicker"]);
                }

function inp(t) {
	var p = t.parents('tr');
	var n = Number( t.val() * p.find('.ckjg').val())
	p.find('.xj').val(n);
}

function inp1(t) {
	var p = t.parents('tr');
	var n = Number( t.val() * p.find('.xysl').val())
	p.find('.xj').val(n);
}

function changedate(th) {
	var t = $(th).parents('tr');
	var sdate = new Date(t.find('.sdate').val()).getTime();
	var edate = new Date(t.find('.edate').val()).getTime();
	var hire_day = t.find('.hire_day');
	if(sdate > edate) {
		layer.msg('结束日期不得早于开始日期', {time: 3000})
		hire_day.val('');
		var cla = '';
		var cl = '';
		$(t).hasClass('edate') ? (cla = '.sdate', cl = '.edate'):(cla = '.edate', cl = '.sdate');
	
		$(cla).val($(cl).val());
	} else {
		var tianshu = (edate - sdate) / (24 * 60 * 60 * 1000);
		if(!isNaN(tianshu)){
			hire_day.val(tianshu)
		}
	}
	
}
