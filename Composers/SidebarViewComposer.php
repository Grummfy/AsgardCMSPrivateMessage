<?php

namespace Modules\PrivateMessage\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
//        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
//            $group->addItem(trans('privatemessage::menu.title-support'), function (SidebarItem $item) {
//                $item->icon = 'fa fa-ticket';
//                $item->weight = 10;
//                $item->authorize(
//                     $this->auth->hasAccess('privatemessage.support.list')
//                );
//	            $item->route('admin.privatemessage.support.list');
//            });
//        });
    }
}
