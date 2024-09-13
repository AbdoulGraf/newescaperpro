<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function faqIndex()
    {

        // $allfaq = FAQ::where('placefor', 'Abu Dhabi')->get();

        $abuDhabiFAQ = FAQ::where('placefor', 'Abu Dhabi')->get()->groupBy('question');

        $uniqueFAQ = collect();
        foreach ($abuDhabiFAQ as $question => $entries) {
            $uniqueFAQ->push($entries->first());
        }

        return view("site.abudhabi.faq", [
            'allfaq' => $uniqueFAQ,
        ]);
    }
}
