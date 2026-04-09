<?php
header('Content-Type: application/json; charset=UTF-8', true, 404);
echo json_encode([
    'code' => 'rest_no_route',
    'message' => 'A API REST do WordPress não está disponível neste site estático em PHP.',
    'data' => ['status' => 404],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
