<?php

namespace Qoutes;

class Qoute extends Generator
{

    /**
     * Get only 'geeky' qoutes from iHeartqoutes.com.
     *
     * @see http://iheartquotes.com/api for available sources
     * @return bool|mixed
     */
    public function geeky()
    {
        $this->options['source'] = [
            'esr', 'humorix_misc', 'humorix_stories',
            'joel_on_software', 'macintosh', 'math',
            'mav_flame', 'osp_rules', 'paul_graham',
            'prog_style', 'subversion'
        ];

        return $this->get();
    }

    /**
     * Get only 'general' qoutes from iHeartqoutes.com.
     *
     * @see http://iheartquotes.com/api for available sources
     * @return bool|mixed
     */
    public function general()
    {
        $this->options['source'] = [
            '1811_dictionary_of_the_vulgar_tongue', 'codehappy', 'fortune',
            'liberty', 'literature', 'misc',
            'murphy', 'oneliners', 'riddles',
            'rkba', 'shlomif', 'shlomif_fav',
            'stephen_wright'
        ];

        return $this->get();
    }

    /**
     * Get only 'populair' qoutes from iHeartqoutes.com.
     *
     * @see http://iheartquotes.com/api for available sources
     * @return bool|mixed
     */
    public function populair()
    {
        $this->options['source'] = [
            'calvin', 'forrestgump', 'friends',
            'futurama', 'holygrail', 'powerpuff',
            'simon_garfunkel', 'simpsons_cbg', 'simpsons_chalkboard',
            'simpsons_homer', 'simpsons_ralph', 'south_park',
            'starwars', 'xfiles',
        ];

        return $this->get();
    }

    /**
     * Get only 'religious' qoutes from iHeartqoutes.com.
     *
     * @see http://iheartquotes.com/api for available sources
     * @return bool|mixed
     */
    public function religious()
    {
        $this->options['source'] = [
            'bible', 'contentions', 'osho'
        ];

        return $this->get();
    }

    /**
     * Get only 'scifi' qoutes from iHeartqoutes.com.
     *
     * @see http://iheartquotes.com/api for available sources
     * @return bool|mixed
     */
    public function scifi()
    {
        $this->options['source'] = [
            'cryptonomicon', 'discworld', 'dune', 'hitchhiker'
        ];

        return $this->get();
    }
}