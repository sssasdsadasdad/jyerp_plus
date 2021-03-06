<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2017 河源市卓锐科技有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------
// | 开源协议 ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

/**
 * 菜单信息
 */
return [
  [
    'title' => '公告',
    'icon' => 'fa fa-fw fa-volume-up',
    'url_type' => 'module_admin',
    'url_value' => 'notice/nlist/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 100,
    'status' => 1,
    'child' => [
      [
        'title' => '公告管理',
        'icon' => 'fa fa-fw fa-gears',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 100,
        'status' => 1,
        'child' => [
          [
            'title' => '公告列表',
            'icon' => '',
            'url_type' => 'module_admin',
            'url_value' => 'notice/nlist/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 100,
            'status' => 1,
            'child' => [
              [
                'title' => '添加',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/add',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
                'child' => [
                  [
                    'title' => '选择通知单位',
                    'icon' => '',
                    'url_type' => 'module_admin',
                    'url_value' => 'notice/nlist/choose',
                    'url_target' => '_self',
                    'online_hide' => 0,
                    'sort' => 100,
                    'status' => 1,
                  ],
                ],
              ],
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '启用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/enable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '发布',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/release',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '撤销',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nlist/cancel',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '我的公告',
            'icon' => '',
            'url_type' => 'module_admin',
            'url_value' => 'notice/nuser/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 100,
            'status' => 1,
            'child' => [
              [
                'title' => '查阅',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nuser/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/nuser/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '公告类型',
            'icon' => '',
            'url_type' => 'module_admin',
            'url_value' => 'notice/cate/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 100,
            'status' => 1,
            'child' => [
              [
                'title' => '增加',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/cate/add',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '修改',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/cate/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/cate/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '启用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/cate/enable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'notice/cate/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];
