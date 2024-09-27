<!DOCTYPE html>
<html lang="ja">

<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="税理士法人ドットプロは、川崎市を拠点に中小企業向けの税務、会計、経営コンサルティングを提供。事業承継、M&A、税務調査対応、IPO支援まで、専門的なサポートを展開し、企業の成長を支援します。認定支援機関として信頼できるアドバイスを提供。">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo esc_url((is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
    <meta name="twitter:title" content="<?php echo wp_get_document_title(); ?>" />
    <meta name="twitter:description" content="税理士法人ドットプロは、川崎市を拠点に中小企業向けの税務、会計、経営コンサルティングを提供。事業承継、M&A、税務調査対応、IPO支援まで、専門的なサポートを展開し、企業の成長を支援します。認定支援機関として信頼できるアドバイスを提供。" />
    <meta name="thumbnail" content="<?= get_template_directory_uri(); ?>/img/global/thumbnail.png" />
    <meta property="og:type" content="<?= og_type(); ?>" />
    <meta property="og:url" content="<?php echo esc_url((is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
    <meta property="og:title" content="<?php echo wp_get_document_title(); ?>" />
    <meta property="og:description" content="税理士法人ドットプロは、川崎市を拠点に中小企業向けの税務、会計、経営コンサルティングを提供。事業承継、M&A、税務調査対応、IPO支援まで、専門的なサポートを展開し、企業の成長を支援します。認定支援機関として信頼できるアドバイスを提供。" />
    <meta property="og:site_name" content="税理士法人ドットプロ | 税務調査対応・事業承継・M&Aコンサルティング" />
    <meta property="og:image" content="<?= get_template_directory_uri(); ?>/img/global/OGP.png" />
    <meta property="og:image:secure_url" content="<?= get_template_directory_uri(); ?>/img/global/OGP.png" />
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="<?php echo esc_url((is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/output.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
</head>

<body>