<?php


namespace App;


class RoleAbilityHelper
{
    private $models = [
        User::class => 'المستخدمون',
        Country::class => 'البلاد',
        City::class => 'المدن',
        Area::class => 'المناطق',
        Address::class => 'العنوان',
        SubscriptionType::class => 'نوع الاشتراك',
        Subscription::class => 'الاشتراك',
        SubscriptionAttribute::class => 'عناصر الاشتراك',
        DriversTime::class => 'اوقات السائقين',
        PriceList::class => 'قائمة الاسعار',
        DriverOrder::class => 'طلبات السائق',
        DriverOrderStatus::class => 'حالة طلبات السائقين',
        GiftCategory::class => 'انواع كروت الهدايا',
        GiftCard::class => 'كروت الهدايا',
        GiftCardUsage::class => 'استخدام كروت الهدايا',
        Coupon::class => 'الكوبونات',
        CouponUsage::class => 'استخدام الكوبونات',
        PaymentMethod::class => 'طرق الدفع',
        OrderStatus::class => 'حالة الطلب',
        Order::class => 'الطلبات',
        Payment::class => 'عمليات الدفع',
        Branch::class => 'الفروع',
        Settings::class => 'الاعدادات',
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
