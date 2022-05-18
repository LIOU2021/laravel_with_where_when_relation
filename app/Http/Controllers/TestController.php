<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Textbook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $version = $request->version;
        // return Textbook::find(1)->bookVersion;
        return Textbook::with(['bookVersion', 'subject'])
            ->when($version, function ($q) use ($version) {
                $q->whereHas('bookVersion', function (Builder $query) use ($version) {
                    $query->where('name', 'like', "%$version%");
                });
            })
            ->get();
    }

    public function index2(Request $request)
    {
        DB::enableQueryLog();
        
        $version = $request->version;
        $bookName = $request->bookName;
        // return Textbook::find(1)->bookVersion;
        $result =  Subject::with(
            [
                'version.bookVersion' => function ($q) use ($version) {
                    $q->where('name', 'like', "%$version%");
                },
                'version' => function ($q) use ($bookName) {
                    $q->where('name', 'like', "%$bookName%");
                }
            ]

        )
            ->when($version, function ($q) use ($version) {
                $q->whereHas('version.bookVersion', function (Builder $query) use ($version) {
                    $query->where('name', 'like', "%$version%");
                });
            })
            ->get();

            $queryLog = DB::getQueryLog();
            return $result;
            dd($queryLog,$result);
    }

    public function index3(Request $request)
    {
        $name = $request->name;
        // return Textbook::find(1)->bookVersion;
        return Subject::with(['version' => function ($q) use ($name) {
            $q->where('name', 'like', "%$name%");
        }])
        ->get();
    }
}
