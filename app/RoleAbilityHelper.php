<?php


namespace App;


class RoleAbilityHelper
{
    private $models = [
        User::class => 'المستخدمون'
    ];
    private $cruds = [
        'show' => 'عرض',
        'edit' => 'تعديل',
        'create' => 'انشاء',
        'delete' => 'حذف',
    ];

    public function modelToName(string $name)
    {
        return $this->models[$name];
    }

    public function crudsToName(string $crud)
    {
        return $this->cruds[$crud];
    }
}
