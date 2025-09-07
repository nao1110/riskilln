<?php
/**
 * リスキルん設定ファイル
 * 
 * このファイルをコピーしてconfig.phpとして使用してください
 * 実際の本番環境では環境変数での設定を推奨します
 */

return [
    // Dify API設定
    'dify' => [
        'api_key' => getenv('DIFY_API_KEY') ?: 'app-YOUR_API_KEY_HERE',
        'base_url' => getenv('DIFY_BASE_URL') ?: 'https://api.dify.ai/v1',
        'timeout' => 30, // API タイムアウト（秒）
    ],
    
    // セッション設定
    'session' => [
        'max_conversation_turns' => 7, // 最大会話ターン数
        'session_timeout' => 3600, // セッションタイムアウト（秒）
    ],
    
    // セキュリティ設定
    'security' => [
        'cors_origins' => ['*'], // 許可するCORSオリジン
        'rate_limit' => [
            'requests_per_minute' => 30,
            'requests_per_hour' => 200,
        ],
        'max_message_length' => 1000, // メッセージの最大文字数
    ],
    
    // ログ設定
    'logging' => [
        'enabled' => true,
        'level' => 'INFO', // DEBUG, INFO, WARNING, ERROR
        'file' => __DIR__ . '/logs/app.log',
    ],
    
    // リスキルン キャラクター設定
    'character' => [
        'name' => 'リスキルん',
        'emoji' => '🐿️',
        'suffix' => 'ルン',
        'personality' => [
            'bright' => true,
            'positive' => true,
            'empathetic' => true,
            'encouraging' => true,
        ],
    ],
    
    // スキル一覧（ハッシュタグ用）
    'skills' => [
        // テクニカルスキル
        'technical' => [
            'Python', 'データ分析', '生成AI', '機械学習', 'プログラミング',
            'Excel活用', '英語', 'マーケティング', '会計知識', 'ファイナンス',
            '営業スキル', 'プレゼン資料作成', '文章力', 'リサーチ力', 'デザイン思考'
        ],
        
        // ソフトスキル
        'soft' => [
            'コミュニケーション', '傾聴', 'ファシリテーション', 'リーダーシップ',
            '問題解決', 'ロジカルシンキング', 'クリティカルシンキング', '創造力',
            '意思決定', '交渉力', 'プレゼンテーション', 'タイムマネジメント',
            'プロジェクト管理', 'チームビルディング', 'コーチング'
        ],
        
        // セルフマネジメント
        'self' => [
            '自己理解', '自己肯定感', 'ストレスマネジメント', '継続力',
            'モチベーション管理', 'マインドフルネス', 'レジリエンス',
            'セルフマネジメント', '学習習慣', '習慣化', '健康管理',
            '柔軟性', 'チャレンジ精神', '内省', '主体性'
        ]
    ],
    
    // 応答パターン設定
    'responses' => [
        'greeting' => [
            'わくわくするルン！どんなお悩みか、聞かせてほしいルン！',
            'こんにちはルン！今日はどんなことで悩んでいるルン？',
            'あなたが好きなこと聞かせてほしいルン！'
        ],
        
        'empathy' => [
            'そうなんですねルン！あなたの気持ちがよく伝わってきますルン。',
            'なるほど、とても大切なことですねルン。',
            'お話しくださってありがとうございますルン！'
        ],
        
        'encouragement' => [
            'やってみようルン！',
            '大丈夫ルン！',
            'わくわくするルン！',
            'きっとできるルン！'
        ],
        
        'fallback' => [
            'すみません、少し調子が悪いみたいですルン...でも、あなたのお気持ちは伝わっていますルン！',
            '申し訳ありませんルン、うまく聞き取れませんでした...もう少し詳しく教えていただけますか？',
            'ちょっと混乱してしまいましたルン...違う言葉で教えていただけますか？'
        ]
    ],
    
    // 環境設定
    'environment' => [
        'debug' => getenv('APP_DEBUG') === 'true',
        'timezone' => 'Asia/Tokyo',
        'locale' => 'ja_JP',
        'charset' => 'UTF-8',
    ],
    
    // さくらサーバー設定
    'sakura' => [
        // FTP設定
        'ftp' => [
            'host' => getenv('SAKURA_FTP_HOST') ?: 'YOUR_DOMAIN.sakura.ne.jp',
            'username' => getenv('SAKURA_FTP_USER') ?: 'your_ftp_username',
            'password' => getenv('SAKURA_FTP_PASS') ?: 'your_ftp_password',
            'port' => 21,
            'passive' => true,
            'ssl' => false,
            'timeout' => 30,
        ],
        
        // サーバー情報
        'server' => [
            'domain' => getenv('SAKURA_DOMAIN') ?: 'your-domain.com',
            'subdomain' => getenv('SAKURA_SUBDOMAIN') ?: '', // サブドメインがある場合
            'document_root' => '/home/YOUR_ACCOUNT/www/',
            'php_version' => '8.0', // 使用するPHPバージョン
        ],
        
        // SSL設定
        'ssl' => [
            'enabled' => true,
            'force_https' => true,
            'cert_type' => 'letsencrypt', // 'letsencrypt' or 'original'
        ],
        
        // データベース設定（使用する場合）
        'database' => [
            'host' => getenv('SAKURA_DB_HOST') ?: 'mysql123.db.sakura.ne.jp',
            'name' => getenv('SAKURA_DB_NAME') ?: 'your_db_name',
            'username' => getenv('SAKURA_DB_USER') ?: 'your_db_user',
            'password' => getenv('SAKURA_DB_PASS') ?: 'your_db_password',
            'port' => 3306,
            'charset' => 'utf8mb4',
        ],
        
        // ログ設定
        'logs' => [
            'directory' => '/home/YOUR_ACCOUNT/www/logs/',
            'max_size' => '10MB',
            'retention_days' => 30,
        ],
    ]
];
?>
