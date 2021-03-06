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
    'title' => '供应商',
    'icon' => 'fa fa-fw fa-fax',
    'url_type' => 'module_admin',
    'url_value' => 'supplier/index/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 100,
    'status' => 1,
    'child' => [
      [
        'title' => '供应商档案',
        'icon' => 'fa fa-fw fa-fax',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 1,
        'status' => 1,
        'child' => [
          [
            'title' => '供应商档案',
            'icon' => 'fa fa-fw fa-fax',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/index/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/index/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/index/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '详情',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/index/detail',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/index/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/index/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 5,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '添加供应商',
            'icon' => 'fa fa-fw fa-plus-circle',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/index/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '供应商类型',
        'icon' => 'fa fa-fw fa-building',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 2,
        'status' => 1,
        'child' => [
          [
            'title' => '供应商类型',
            'icon' => 'fa fa-fw fa-building',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/type/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/type/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/type/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '启用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/type/enable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/type/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/type/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 5,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '添加供应商类型',
            'icon' => 'fa fa-fw fa-plus-circle',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/type/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '供应商物品',
        'icon' => 'fa fa-fw fa-briefcase',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 3,
        'status' => 1,
        'child' => [
          [
            'title' => '物品列表',
            'icon' => 'fa fa-fw fa-briefcase',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/res/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/res/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/res/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '详情',
                'icon' => 'fa fa-fw fa-search',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/res/detail',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/res/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/res/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 5,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '添加物品',
            'icon' => 'fa fa-fw fa-plus-circle',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/res/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '联络记录',
        'icon' => 'glyphicon glyphicon-earphone',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 4,
        'status' => 1,
        'child' => [
          [
            'title' => '记录列表',
            'icon' => 'glyphicon glyphicon-earphone',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/phone/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/phone/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/phone/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '详情',
                'icon' => 'fa fa-fw fa-search',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/phone/detail',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
              [
                'title' => '禁用',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/phone/disable',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 4,
                'status' => 1,
              ],
              [
                'title' => '快速编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'supplier/phone/quickedit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 5,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '添加记录',
            'icon' => 'fa fa-fw fa-plus-circle',
            'url_type' => 'module_admin',
            'url_value' => 'supplier/phone/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
    ],
  ],
];
