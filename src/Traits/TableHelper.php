<?php

namespace PropaySystems\Utilities\Traits;

trait TableHelper
{
    /**
     * @param $data
     * @return void
     */
    public function handleRecords($data)
    {
        $totalRecords = $data->total();
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $lastRecordOnPage = $currentPage * $perPage;

        if ($this->page > 1 && $lastRecordOnPage > $totalRecords) {
            $this->gotoPage(1);
            $this->refresh();
        }
    }

    public function filterChanged(): void
    {
        $this->handleRecords($this->fillData());
    }
}
