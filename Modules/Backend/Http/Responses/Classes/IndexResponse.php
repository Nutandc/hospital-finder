<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Classes;


use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function toResponse($request)
    {
        return view('backend::class.index')
            ->with('classes', $this->class->sortByDesc('created_at'));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
