<?php

namespace Smaft\OktaSdk\Parser;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class LinkParser
{
    public function parseLinkHeader($linkHeader)
    {
        preg_match_all(
            '#<(http[^>]+)>; rel="([^"]+)"#',
            $linkHeader,
            $matches
        );

        $links = [];
        foreach ($matches[1] as $index => $url) {
            $rel = $matches[2][$index];

            $links[$rel] = $url;
        }

        return $links;
    }
}
