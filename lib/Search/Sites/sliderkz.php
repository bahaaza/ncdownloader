<?php

namespace OCA\NCDownloader\Search\Sites;
use OCA\NCDownloader\Tools\Helper;

//slider.kz
class sliderkz extends searchBase
{
    public $baseUrl = "https://slider.kz/vk_auth.php";
    protected $query = null;
    protected $tableTitles = [];

    public function __construct($client)
    {
        $this->client = $client;
    }
    public function search(string $keyword): array
    {
        $this->query = ['q' => trim($keyword)];
        $this->searchUrl = $this->baseUrl;
        $this->getItems()->setTableTitles(["Title", "Duration", "Actions"])->addActionLinks(null);
        return ["title" => $this->getTableTitles(), 'row' => $this->getRows()];
    }

    public function getItems()
    {
        $data = $this->getResponse();
        $this->rows = $this->transformResp($data);
        return $this;
    }
    protected function getDownloadUrl(array $item): string
    {
        extract($item);
        return sprintf("https://slider.kz/download/%s/%s/%s/%s.mp3?extra=null", $id, $duration, $url, urlencode($tit_art));
    }

    private function transformResp($data): array
    {
        $items = [];
        if (count($data) < 1) {
            return [];
        }
        foreach ($data as $item) {
            $items[] = array("title" => $item["tit_art"], "data-link" => $this->getDownloadUrl($item), "duration" => Helper::formatInterval($item["duration"]));
        }
        unset($data);
        return $items;
    }

    public function getResponse(): array
    {

        try {
            $response = $this->client->request('GET', $this->searchUrl, ['query' => $this->query]);
            $resp = $response->toArray();
        } catch (ExceptionInterface $e) {
            return ["error" => $e->getMessage()];
        }
        if (isset($resp['audios'])) {
            return array_values($resp["audios"])[0];
        }

        return [];
    }
}