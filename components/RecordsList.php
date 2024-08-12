<?php namespace Pensoft\Resources\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Pensoft\Resources\Models\Data;

/**
 * RecordsList Component
 */
class RecordsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'RecordsList Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->records = $this->searchRecords();
        $this->page['records'] = $this->records;
    }



    public function onSearchRecords() {
        $searchTerms = post('searchTerms');
        $sortFormat = post('sortFormat');
        $dateFrom = post('dateFrom');
        $dateTo = post('dateTo');
        $this->page['records'] = $this->searchRecords($searchTerms, $sortFormat, $dateFrom, $dateTo);
        return ['#recordsContainer' => $this->renderPartial('library_records')];
    }

    protected function searchRecords(
        $searchTerms = '',
        $sortFormat = 0,
        $dateFrom = '',
        $dateTo = ''
    ) {
        $searchTerms = is_string($searchTerms) ? json_decode($searchTerms, true) : (array)$searchTerms;
        $result = Data::searchTerms($searchTerms);
        if($sortFormat){
            $result->where('format_id', "{$sortFormat}");
        }
        if($dateFrom){
            $result->where('date', '>=', Carbon::parse($dateFrom));
        }
        if($dateTo){
            $result->where('date', '<=', Carbon::parse($dateTo));
        }
        return $result->get();
    }
}
