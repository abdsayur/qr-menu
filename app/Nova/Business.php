<?php

namespace App\Nova;

use Illuminate\Support\Facades\Auth;

// use Faker\Provider\ar_EG\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Color;


use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Sietse85\NovaButton\Button;

class Business extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Business::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    // public static function relatableUsers(NovaRequest $request, $query)
    // {
    //     return $query->where('user_id', auth()->user->id);
    // }
    public static function indexQuery(NovaRequest $request, $query)
    {

        $business = DB::table('buisness_user')->where('user_id', Auth::id())->get();
        $ids = [];
        foreach ($business as $item) {

            array_push($ids, $item->business_id);
        }

        return $query->where('id', $ids);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name'),
            Text::make('slogan')->nullable(),


            Image::make('image')->disk('ftp')->path('Businesses/')->preview(function () {
                return 'http://qr.algorexe.com/images/' . $this->image;
            })->thumbnail(function () {
                return 'http://qr.algorexe.com/images/' . $this->image;
            }),

            Image::make('cover')->disk('ftp')->path('Businesses/')->preview(function () {
                return 'http://qr.algorexe.com/images/' . $this->cover;
            })->thumbnail(function () {
                return 'http://qr.algorexe.com/images/' . $this->cover;
            }),

            Textarea::make('address'),
             Color::make('Main Color', 'color1'),
            // Swatches::make('Secondery Color', 'color2'),
            Text::make('phone'),
            Text::make('whatsapp')->help(
                'Phone number with country code'
            ),
            Text::make('facebook')->help(
                'facebook link'
            ),
            Text::make('instagram')->help(
                'instagram link'
            ),
            Text::make('twitter')->help(
                'twitter link'
            ),
            Text::make('tiktok')->help(
                'tiktok link'
            ),
            Boolean::make('use rate','rate_option'),
            Number::make('Rate','rate')->default(0.0),
            Button::make('QR')->link('http://www.qr.algorexe.com/qr-generator/' . $this->slug),
            HasMany::make('categories'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}