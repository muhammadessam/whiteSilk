<?php


namespace App;


class RoleAbilityHelper
{
    private $models = [
        User::class => 'المستخدمون',
        Country::class => 'البلاد',
        City::class => 'المدن',
        Area::class => 'المناطق',
    ];
    private $cruds = [
        'show' => 'عرض',
        'edit' => 'تعديل',
        'create' => 'انشاء',
        'delete' => 'حذف',
    ];

    public function modelToName(string $name)
    {
        return array_key_exists($name, $this->models) ? $this->models[$name] : '';
    }

    public function crudsToName(string $crud)
    {
        return array_key_exists($crud, $this->cruds) ? $this->cruds[$crud] : '';
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
