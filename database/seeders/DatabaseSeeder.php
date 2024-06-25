<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'Администратор'
        ]);
        Role::create([
            'name' => 'Модератор'
        ]);
        Role::create([
            'name' => 'Пользователь'
        ]);
        User::create([
            'username' => 'lexa',
            'password_hash' => 'lexa2019',
            'email' => 'lexa@gmail.com',
            'role_id' => 3
        ]);
        User::create([
            'username' => 'masha',
            'password_hash' => 'masha2020',
            'email' => 'masha@gmail.com',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'ivan',
            'password_hash' => 'ivan2021',
            'email' => 'ivan@gmail.com',
            'role_id' => 1
        ]);

        User::create([
            'username' => 'daria',
            'password_hash' => 'daria2022',
            'email' => 'daria@gmail.com',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'nikita',
            'password_hash' => 'nikita2023',
            'email' => 'nikita@gmail.com',
            'role_id' => 3
        ]);

        User::create([
            'username' => 'olga',
            'password_hash' => 'olga2024',
            'email' => 'olga@gmail.com',
            'role_id' => 1
        ]);

        User::create([
            'username' => 'pavel',
            'password_hash' => 'pavel2025',
            'email' => 'pavel@gmail.com',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'svetlana',
            'password_hash' => 'svetlana2026',
            'email' => 'svetlana@gmail.com',
            'role_id' => 3
        ]);

        User::create([
            'username' => 'dmitry',
            'password_hash' => 'dmitry2027',
            'email' => 'dmitry@gmail.com',
            'role_id' => 1
        ]);

        User::create([
            'username' => 'alisa',
            'password_hash' => 'alisa2028',
            'email' => 'alisa@gmail.com',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'sergey',
            'password_hash' => 'sergey2029',
            'email' => 'sergey@gmail.com',
            'role_id' => 3
        ]);
        Category::create([
            'name' => 'Молочные изделия'
        ]);

        Category::create([
            'name' => 'Фрукты'
        ]);

        Category::create([
            'name' => 'Овощи'
        ]);

        Category::create([
            'name' => 'Мясные изделия'
        ]);

        Category::create([
            'name' => 'Напитки'
        ]);

        Category::create([
            'name' => 'Бакалея'
        ]);

        Category::create([
            'name' => 'Выпечка'
        ]);

        Category::create([
            'name' => 'Морепродукты'
        ]);

        Category::create([
            'name' => 'Замороженные продукты'
        ]);

        Category::create([
            'name' => 'Сладости'
        ]);
        Product::create([
            'name' => 'Молоко',
            'description' => 'Свежее коровье молоко 1 литр.',
            'price' => 50.00,
            'quantity' => 100,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Яблоко',
            'description' => 'Свежие яблоки сорта Гренни Смит.',
            'price' => 30.00,
            'quantity' => 200,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Картофель',
            'description' => 'Картофель свежий, 1 кг.',
            'price' => 20.00,
            'quantity' => 150,
            'category_id' => 3
        ]);

        Product::create([
            'name' => 'Куриное филе',
            'description' => 'Свежий куриный филе, 1 кг.',
            'price' => 250.00,
            'quantity' => 50,
            'category_id' => 4
        ]);

        Product::create([
            'name' => 'Апельсиновый сок',
            'description' => 'Натуральный апельсиновый сок, 1 литр.',
            'price' => 80.00,
            'quantity' => 120,
            'category_id' => 5
        ]);

        Product::create([
            'name' => 'Макароны',
            'description' => 'Макароны высшего сорта, 500 г.',
            'price' => 40.00,
            'quantity' => 300,
            'category_id' => 6
        ]);

        Product::create([
            'name' => 'Хлеб',
            'description' => 'Свежий пшеничный хлеб.',
            'price' => 25.00,
            'quantity' => 80,
            'category_id' => 7
        ]);

        Product::create([
            'name' => 'Креветки',
            'description' => 'Свежие креветки, 1 кг.',
            'price' => 500.00,
            'quantity' => 30,
            'category_id' => 8
        ]);

        Product::create([
            'name' => 'Замороженная пицца',
            'description' => 'Готовая замороженная пицца с ветчиной и грибами.',
            'price' => 150.00,
            'quantity' => 60,
            'category_id' => 9
        ]);

        Product::create([
            'name' => 'Шоколад',
            'description' => 'Темный шоколад, 100 г.',
            'price' => 70.00,
            'quantity' => 90,
            'category_id' => 10
        ]);
        Order::create([
            'status' => 'В обработке',
            'address' => 'ул. Ленина, д. 10, кв. 5',
            'date_placement' => '2024-06-01 12:00:00',
            'user_id' => 1
        ]);

        Order::create([
            'status' => 'Доставлен',
            'address' => 'ул. Советская, д. 20, кв. 15',
            'date_placement' => '2024-06-02 14:30:00',
            'user_id' => 2
        ]);

        Order::create([
            'status' => 'Отменен',
            'address' => 'ул. Мира, д. 30, кв. 25',
            'date_placement' => '2024-06-03 16:00:00',
            'user_id' => 3
        ]);

        Order::create([
            'status' => 'В пути',
            'address' => 'ул. Победы, д. 40, кв. 35',
            'date_placement' => '2024-06-04 18:30:00',
            'user_id' => 4
        ]);

        Order::create([
            'status' => 'В обработке',
            'address' => 'ул. Гагарина, д. 50, кв. 45',
            'date_placement' => '2024-06-05 09:00:00',
            'user_id' => 5
        ]);

        Order::create([
            'status' => 'Доставлен',
            'address' => 'ул. Пушкина, д. 60, кв. 55',
            'date_placement' => '2024-06-06 11:30:00',
            'user_id' => 6
        ]);

        Order::create([
            'status' => 'Отменен',
            'address' => 'ул. Лермонтова, д. 70, кв. 65',
            'date_placement' => '2024-06-07 13:00:00',
            'user_id' => 7
        ]);

        Order::create([
            'status' => 'В пути',
            'address' => 'ул. Толстого, д. 80, кв. 75',
            'date_placement' => '2024-06-08 15:30:00',
            'user_id' => 8
        ]);

        Order::create([
            'status' => 'В обработке',
            'address' => 'ул. Чехова, д. 90, кв. 85',
            'date_placement' => '2024-06-09 17:00:00',
            'user_id' => 9
        ]);

        Order::create([
            'status' => 'Доставлен',
            'address' => 'ул. Тургенева, д. 100, кв. 95',
            'date_placement' => '2024-06-10 19:30:00',
            'user_id' => 10
        ]);
        OrderItem::create([
            'quantity' => 2,
            'order_id' => 1,
            'product_id' => 1
        ]);

        OrderItem::create([
            'quantity' => 3,
            'order_id' => 1,
            'product_id' => 2
        ]);

        OrderItem::create([
            'quantity' => 1,
            'order_id' => 2,
            'product_id' => 3
        ]);

        OrderItem::create([
            'quantity' => 5,
            'order_id' => 2,
            'product_id' => 4
        ]);

        OrderItem::create([
            'quantity' => 2,
            'order_id' => 3,
            'product_id' => 5
        ]);

        OrderItem::create([
            'quantity' => 1,
            'order_id' => 4,
            'product_id' => 6
        ]);

        OrderItem::create([
            'quantity' => 4,
            'order_id' => 4,
            'product_id' => 7
        ]);

        OrderItem::create([
            'quantity' => 3,
            'order_id' => 5,
            'product_id' => 8
        ]);

        OrderItem::create([
            'quantity' => 2,
            'order_id' => 6,
            'product_id' => 9
        ]);

        OrderItem::create([
            'quantity' => 6,
            'order_id' => 6,
            'product_id' => 10
        ]);

        OrderItem::create([
            'quantity' => 1,
            'order_id' => 7,
            'product_id' => 1
        ]);

        OrderItem::create([
            'quantity' => 2,
            'order_id' => 7,
            'product_id' => 3
        ]);

        OrderItem::create([
            'quantity' => 3,
            'order_id' => 8,
            'product_id' => 5
        ]);

        OrderItem::create([
            'quantity' => 4,
            'order_id' => 8,
            'product_id' => 7
        ]);

        OrderItem::create([
            'quantity' => 2,
            'order_id' => 9,
            'product_id' => 9
        ]);

        OrderItem::create([
            'quantity' => 1,
            'order_id' => 10,
            'product_id' => 10
        ]);

        OrderItem::create([
            'quantity' => 2,
            'order_id' => 10,
            'product_id' => 2
        ]);
        CartItem::create([
            'quantity' => 2,
            'user_id' => 1,
            'product_id' => 1
        ]);

        CartItem::create([
            'quantity' => 1,
            'user_id' => 1,
            'product_id' => 3
        ]);

        CartItem::create([
            'quantity' => 3,
            'user_id' => 2,
            'product_id' => 2
        ]);

        CartItem::create([
            'quantity' => 4,
            'user_id' => 2,
            'product_id' => 5
        ]);

        CartItem::create([
            'quantity' => 1,
            'user_id' => 3,
            'product_id' => 4
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 3,
            'product_id' => 6
        ]);

        CartItem::create([
            'quantity' => 5,
            'user_id' => 4,
            'product_id' => 7
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 4,
            'product_id' => 9
        ]);

        CartItem::create([
            'quantity' => 3,
            'user_id' => 5,
            'product_id' => 8
        ]);

        CartItem::create([
            'quantity' => 1,
            'user_id' => 5,
            'product_id' => 10
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 6,
            'product_id' => 1
        ]);

        CartItem::create([
            'quantity' => 4,
            'user_id' => 6,
            'product_id' => 3
        ]);

        CartItem::create([
            'quantity' => 3,
            'user_id' => 7,
            'product_id' => 2
        ]);

        CartItem::create([
            'quantity' => 1,
            'user_id' => 7,
            'product_id' => 5
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 8,
            'product_id' => 4
        ]);

        CartItem::create([
            'quantity' => 1,
            'user_id' => 8,
            'product_id' => 6
        ]);

        CartItem::create([
            'quantity' => 3,
            'user_id' => 9,
            'product_id' => 7
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 9,
            'product_id' => 8
        ]);

        CartItem::create([
            'quantity' => 4,
            'user_id' => 10,
            'product_id' => 9
        ]);

        CartItem::create([
            'quantity' => 2,
            'user_id' => 10,
            'product_id' => 10
        ]);

    }
}
