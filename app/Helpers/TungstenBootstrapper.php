<?php

class TungstenBootstrapper
{

    protected static $counter = 0;

    /**
     * Register a Tungsten bootstrapped app for a given view
     *
     * @param  \View $main_view  Main view to nest into
     * @param  string $nest_as   Key to embed this view into the template
     * @param  string $template  Mustache template to render using
     * @param  string $data      Initial data to render with
     * @param  string $view      Name of the main View constructor registered in factory.js
     * @param  string $model     Name of the main Model constructor registered in factory.js
     */
    public static function register($main_view, $nest_as, $template, $data, $view, $model)
    {
        // Create unique ID for the element
        $id = 'App' . (++self::$counter);

        // Add bootstrap data to JS namespace
        \JavaScript::put([
            $id => [
                'view' => $view,
                'model' => $model,
                'template' => $template,
                'data' => $data
            ]
        ]);

        // Nest a tungsten_wrapper view into the given key with the proper data
        $main_view->nest($nest_as, 'tungsten_wrapper', [
                'id' => $id,
                'template_view' => $template,
                'data' => $data
            ]
        );
    }
}
