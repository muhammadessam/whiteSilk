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

    /**
     * @return string[]
     */
    public function getModels(): array
    {
        return $this->models;
    }

    /**
     * @return string[]
     */
    public function getCruds(): array
    {
        return $this->cruds;
    }
}
