<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\AdvertisementElixir;
use App\Models\AdvertisementGem;
use App\Models\Elixir;
use App\Models\Gem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvertisementController extends Controller
{
    public function create()
    {
        return view('advertisements.create');
    }

    public function createGem()
    {
        return view('advertisements.create-gem');
    }

    public function storeGem(Request $request)
    {
        // Валидация данных из запроса
        $validatedData = $request->validate([
            'gem_qualities' => 'required|string|max:255',
            'gem_type' => 'required|string|max:255',
            'gem_price' => 'required|numeric|min:0',
            'gem_count' => 'nullable|integer|min:1',
            'gem_game_mod' => 'required|string',
        ]);

        // Создание объявления
        $advertisement = Advertisement::create([
            'user_id' => auth()->id(), // Предполагается, что у вас есть аутентификация пользователей
            'price' => $validatedData['gem_price'],
            'count' => $validatedData['gem_count'] ?? 1,
            'type' => 'regular',
            'status' => 1,
            'item' => 'gem',
            'game_mod' => $validatedData['gem_game_mod'],
            'views' => 0,
        ]);

        $title = '';
        if ($validatedData['gem_qualities'] == 'regular') {
            $title = $validatedData['gem_type'];
        } else $title = $validatedData['gem_qualities'] . ' ' . $validatedData['gem_type'];
        $gem = Gem::where('title', $title)->first();
        if ($gem) {
            $advertisement_gem = AdvertisementGem::create([
                'advertisement_id' => $advertisement->id,
                'gem_id' => $gem->id
            ]);
        } else {
            return redirect()->route('advertisements.create-elixir', ['item' => 'elixir'])
                ->withErrors(['error' => 'There was an error while creating an ad. Please try again.'])
                ->withInput();
        }

        if ($advertisement && $advertisement_gem) {
            Session::flash('success', 'The ad has been successfully created!');
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('advertisements.create-gem', ['item' => 'gem'])
                ->withErrors(['error' => 'There was an error while creating an ad. Please try again.'])
                ->withInput();
        }
    }

    public function storeEquipment(Request $request)
    {
        return redirect()->route('advertisements.create');
    }

    public function createElixir()
    {
        return view('advertisements.create-elixir');
    }

    public function storeElixir(Request $request)
    {
        // Валидация данных из запроса
        $validatedData = $request->validate([
            'elixir_title' => 'required|string|max:255',
            'elixir_description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'elixir_id' => 'nullable|exists:elixirs,id',
            'elixir_price' => 'required|numeric|min:0',
            'elixir_count' => 'nullable|integer|min:1',
            'elixir_game_mod' => 'required|string',
        ]);

        // Создание объявления
        $advertisement = Advertisement::create([
            'user_id' => auth()->id(), // Предполагается, что у вас есть аутентификация пользователей
            'price' => $validatedData['elixir_price'],
            'count' => $validatedData['elixir_count'] ?? 1,
            'type' => 'regular',
            'status' => 1,
            'item' => 'elixir',
            'game_mod' => $validatedData['elixir_game_mod'],
            'views' => 0,
        ]);
        $image = 'default.webp';
        if ($validatedData['elixir_id']) {
            $elixir = Elixir::where('id', $validatedData['elixir_id'])->first();
            $image = $elixir->image;
        }
        $advertisement_elixir = AdvertisementElixir::create([
            'advertisement_id' => $advertisement->id,
            'elixir_id' => $validatedData['elixir_id'] ?? null,
            'title' => $validatedData['elixir_title'],
            'description' => $validatedData['elixir_description'],
            'image' => $image,
        ]);

        if ($advertisement && $advertisement_elixir) {
            Session::flash('success', 'Объявление успешно создано!');
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('advertisements.create-elixir', ['item' => 'elixir'])
                ->withErrors(['error' => 'Произошла ошибка при создании объявления. Пожалуйста, попробуйте ещё раз.'])
                ->withInput();
        }
    }
}
