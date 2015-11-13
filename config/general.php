<?php
return [
    /*
     |--------------------------------------------------------------------------
     | Upload provider
     |--------------------------------------------------------------------------
     |
     | Upload provider is used to store the assets to the picked system
     |
     */
    'upload' => [
        'provider' => function () {
            $s3Config = config('filesystems.disks.s3');
            $nodesConfig = config('nodes.assetsv2.providers.nodes');

            return new \Nodes\Assets\Upload\Provider\NodesS3($s3Config, $nodesConfig);
        }
    ],
    /*
     |--------------------------------------------------------------------------
     | Url provider
     |--------------------------------------------------------------------------
     |
     | Url provider is to generate urls matching the uploaded files
     |
     */
    'url' => [
        'provider' => function () {
            $nodesConfig = config('nodes.assetsv2.providers.nodes');

            return new \Nodes\Assets\Url\Provider\NodesCdn($nodesConfig);
        }
    ],
];