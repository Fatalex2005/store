<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Метод создания категории
    public function createCategory(CategoryCreateRequest $request)
    {
        // Проверяем, есть ли категория с таким именем уже в базе данных
        $existingCategory = Category::where('name', $request->input('name'))->first();
        if ($existingCategory) {
            throw new ApiException(422, 'Категория с таким именем уже существует');
        }
        // Создаем новую категорию
        $category = new Category([
            'name' => $request->input('name'),
        ]);
        // Сохраняем категорию в базе данных
        $category->save();
        // Возвращаем успешный ответ
        return response()->json(['message' => 'Категория успешно создана'], 201);
    }
//Метод создания товара
    public function createProduct(ProductCreateRequest $request)
    {
        // Проверяем, есть ли продукт с таким именем уже в базе данных
        $existingProduct = Product::where('name', $request->input('name'))->first();
        if ($existingProduct) {
            throw new ApiException(422, 'Продукт с таким именем уже существует');
        }
        // Создаем новый продукт
        $product = new Product($request->all());
        // Сохраняем продукт в базе данных
        $product->save();
        // Получаем ID только что созданного продукта
        $productId = $product->id;
        return response()->json(['message' => 'Продукт успешно создан'], 201);
    }
//Метод обновления категории
    public function updateCategory(CategoryUpdateRequest $request, $id)
    {
        //Проверка существования
        $category = Category::find($id);
        if (!$category) {
            throw new ApiException(404, 'Категория не найдена');
        }
        // Проверяем, есть ли категория с таким именем уже в базе данных
        $existingCategory = Category::where('name', $request->input('name'))->first();
        if ($existingCategory) {
            throw new ApiException(422, 'Категория с таким именем уже существует');
        }
        $category->name = $request->input('name');
        $category->save();
        return response()->json(['message' => 'Категория успешно обновлена'], 200);
    }
//Метод обновления товара
    public function updateProduct(ProductUpdateRequest $request, $id)
    {
        //Проверка существования
        $product = Product::find($id);
        if (!$product) {
            throw new ApiException(404, 'Товар не найден');
        }
        // Проверяем, есть ли продукт с таким именем уже в базе данных
        $existingProduct = Product::where('name', $request->input('name'))->first();
        if ($existingProduct) {
            throw new ApiException(422, 'Продукт с таким именем уже существует');
        }
        $product->save();
        return response()->json(['message' => 'Товар успешно обновлен'], 200);
    }
    //Метод удаления категории
    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new ApiException(404, 'Категория не найдена');
        }

        $category->delete();

        return response()->json(['message' => 'Категория успешно удалена'], 200);
    }
    //Метод удаления товара
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            throw new ApiException(404, 'Продукт не найден');

        }
        $product->delete();
        return response()->json(['message' => 'Продукт успешно удален'], 200);
    }
    // Метод обновления статуса заказа
    public function updateOrder(OrderUpdateRequest $request, $orderId)
    {
        // Получаем заказ по ID
        $order = Order::findOrFail($orderId);

        // Обновляем статус заказа и адрес (если предоставлен)
        if ($request->has('status')) {
            $order->status = $request->input('status');
        }
        if ($request->has('address')) {
            $order->address = $request->input('address');
        }

        $order->save();

        return response()->json(['message' => 'Заказ успешно обновлен'], 200);
    }
}
