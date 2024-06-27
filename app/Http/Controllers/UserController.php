<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Метод регистрации
    public function create(UserCreateRequest $request) {
        $user = new User($request->all());
        $user->role_id = 3; // Устанавливаем значение role_id(User)
        $user->save();
        return response([
            'message' => 'Регистрация прошла успешно',
        ], 201);
    }
    //Метод просмотра текущего пользователя
    public function this() {
        $user = auth()->user();

        return response()->json([
            'data' => $user
        ]);
    }
    //Метод обновления профиля
    public function updateProfile(UserUpdateRequest $request) {
        // Получаем текущего аутентифицированного пользователя
        $user = auth()->user();
        //Обновляем данные
        $user->fill($request->all());
        // Сохраняем обновленные данные профиля пользователя
        $user->save();
        return response()->json(['message' => 'Профиль успешно обновлен'], 200);
    }
    //Метод для просмотра всех купленных товаров и другой соответствующей информации
    public function compound()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        $result = [];
            foreach ($orders as $order) {
                $products = $order->items->map(function ($item) {
                    return [
                        'product' => $item->product,
                        'quantity' => $item->quantity
                    ];
                });

                $result[] = [
                    'order' => $order,
                    'products' => $products
                ];
            }

            return response()->json($result);
        }
}
