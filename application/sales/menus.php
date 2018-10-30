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
    'title' => '销售',
    'icon' => 'fa fa-fw fa-handshake-o',
    'url_type' => 'module_admin',
    'url_value' => 'sales/index/index',
    'url_target' => '_self',
    'online_hide' => 0,
    'sort' => 100,
    'status' => 1,
    'child' => [
      [
        'title' => '销售计划',
        'icon' => 'fa fa-fw fa-building-o',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 1,
        'status' => 1,
        'child' => [
          [
            'title' => '计划列表',
            'icon' => 'fa fa-fw fa-th',
            'url_type' => 'module_admin',
            'url_value' => 'sales/index/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑计划',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/index/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除计划',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/index/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => 'fa fa-fw fa-search',
                'url_type' => 'module_admin',
                'url_value' => 'sales/index/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 3,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增计划',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/index/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '销售机会',
        'icon' => 'fa fa-fw fa-th-large',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 2,
        'status' => 1,
        'child' => [
          [
            'title' => '机会列表',
            'icon' => 'fa fa-fw fa-history',
            'url_type' => 'module_admin',
            'url_value' => 'sales/opport/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑机会',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/opport/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除机会',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/opport/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/opport/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增机会',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/opport/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '销售报价',
        'icon' => 'fa fa-fw fa-th-large',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 3,
        'status' => 1,
        'child' => [
          [
            'title' => '报价列表',
            'icon' => 'fa fa-fw fa-paper-plane-o',
            'url_type' => 'module_admin',
            'url_value' => 'sales/offer/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑报价',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/offer/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除报价',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/offer/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/offer/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增报价',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/offer/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '销售合同',
        'icon' => 'fa fa-fw fa-th-large',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 4,
        'status' => 1,
        'child' => [
          [
            'title' => '合同列表',
            'icon' => 'fa fa-fw fa-bold',
            'url_type' => 'module_admin',
            'url_value' => 'sales/contract/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑合同',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/contract/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除合同',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/contract/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/contract/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增合同',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/contract/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '销售订单',
        'icon' => 'fa fa-fw fa-th-large',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 5,
        'status' => 1,
        'child' => [
          [
            'title' => '订单列表',
            'icon' => 'fa fa-fw fa-pencil',
            'url_type' => 'module_admin',
            'url_value' => 'sales/order/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑订单',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/order/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除订单',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/order/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/order/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增订单',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/order/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
          ],
        ],
      ],
      [
        'title' => '销售发货',
        'icon' => 'fa fa-fw fa-th-large',
        'url_type' => 'module_admin',
        'url_value' => '',
        'url_target' => '_self',
        'online_hide' => 0,
        'sort' => 6,
        'status' => 1,
        'child' => [
          [
            'title' => '发货列表',
            'icon' => 'fa fa-fw fa-th',
            'url_type' => 'module_admin',
            'url_value' => 'sales/delivery/index',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 1,
            'status' => 1,
            'child' => [
              [
                'title' => '编辑',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/delivery/edit',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
              [
                'title' => '删除',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/delivery/delete',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 2,
                'status' => 1,
              ],
              [
                'title' => '查看',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/delivery/task_list',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 100,
                'status' => 1,
              ],
            ],
          ],
          [
            'title' => '新增发货',
            'icon' => 'fa fa-fw fa-plus',
            'url_type' => 'module_admin',
            'url_value' => 'sales/delivery/add',
            'url_target' => '_self',
            'online_hide' => 0,
            'sort' => 2,
            'status' => 1,
            'child' => [
              [
                'title' => '物品列表',
                'icon' => '',
                'url_type' => 'module_admin',
                'url_value' => 'sales/delivery/choose_materials',
                'url_target' => '_self',
                'online_hide' => 0,
                'sort' => 1,
                'status' => 1,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];
