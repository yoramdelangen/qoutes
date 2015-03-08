<?php

namespace Qoutes;

use  GuzzleHttp\Client as GuzzleClient;

abstract class Generator
{

    /**
     * When the Guzzle Client returns a false or throws exception, this variable will store the thrown Exception.
     *
     * @var \Exception
     */
    public $exception;

    /**
     * The URL of the iHeartqoutes API.
     *
     * @see http://iheartquotes.com/api
     * @var string
     */
    private $url = 'http://www.iheartquotes.com/api/v1/random';

    /**
     * Detain options for the API.
     *
     * @var array
     */
    protected $options = [];

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * Convert sub-array-items to a string separated by '+'.
     *
     * @see http://iheartquotes.com/api
     * @return array
     */
    private function parseOptions()
    {
        $options = [];

        foreach ($this->options as $key => $option) {
            if (is_array($option))
                $options[ $key ] = implode('+', $option);
            else
                $options[ $key ] = $option;
        }

        return $options;
    }

    /**
     * Get random qoute from the iHeartqoutes website.
     *
     * @return bool|mixed
     */
    public function get()
    {
        // set format hardcoded for now
        $this->options['format'] = 'json';

        $options = $this->parseOptions();

        try {
            $client = new GuzzleClient();
            $request = $client->get($this->url, ['query' => $options]);
        } catch (\Exception $e) {
            $this->exception = $e;
            return false;
        }

        $output = $request->json();

        return [
            'tags'  => $output['tags'],
            'qoute' => $output['quote'],
            'link'  => $output['link'],
        ];
    }

    /**
     * Set max lines for the qoute
     *
     * @param $max
     * @return $this
     */
    public function maxLine($max)
    {
        $this->options['max_lines'] = (int)$max;
        return $this;
    }

    /**
     * Set minimal amount of lines for qoute
     *
     * @param $min
     * @return $this
     */
    public function minLines($min)
    {
        $this->options['min_lines'] = (int)$min;
        return $this;
    }

    /**
     * Set maximal characters a qoute can have
     *
     * @param $max
     * @return $this
     */
    public function maxCharacters($max)
    {
        $this->options['max_characters'] = (int)$max;
        return $this;
    }

    /**
     * Set minimal amount of characters of a qoute
     *
     * @param $min
     * @return $this
     */
    public function minCharacters($min)
    {
        $this->options['min_characters'] = (int)$min;
        return $this;
    }
}