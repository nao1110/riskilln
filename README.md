# Riskilln - キャリア自律のための学びのインフラ

![Riskilln](https://img.shields.io/badge/Riskilln-キャリアコンサルタント-orange)
![License](https://img.shields.io/badge/license-MIT-blue)
![Version](https://img.shields.io/badge/version-1.0.0-green)

## 概要

「Riskilln」は、キャリアに迷う大人に向けたAIキャリアコンサルタントサービスです。日々の小さな「ぼやき」から、必要なスキルを3つ提案し、学びの第一歩をサポートします。

## 特徴

### 🐿️ 親しみやすいキャラクター
- 好奇心旺盛なリス「リスキルん」がキャリア相談に対応
- 語尾に「〜ルン」をつけて、親しみやすい雰囲気を演出

### 💭 ぼやきから始める学び
- 「プレゼンがうまくいかない」「作業がつまらない」などの日常の悩みが出発点
- 堅苦しいキャリア相談のイメージを払拭

### 🎯 3つのスキル提案
- 専門的なキャリアコンサルティング技法を組み込んだAI
- 対話を通じて最適な3つのスキルをハッシュタグ形式で提案

### 🚀 キャリア自律支援
- 「なぜ学ぶ必要があるのか？」という根本的な問いに焦点
- 自己理解を深め、未来への第一歩をサポート

## 技術スタック

- **フロントエンド**: HTML5, CSS3, JavaScript (ES6+)
- **バックエンド**: PHP 7.4+
- **AI統合**: Dify API
- **デプロイ**: さくらサーバー対応
- **デザイン**: レスポンシブデザイン、モダンUI

## セットアップ

### 1. 環境要件
- PHP 7.4以上
- Web サーバー (Apache/Nginx)
- cURL 拡張モジュール

### 2. インストール
```bash
# プロジェクトをクローン
git clone [repository-url]
cd riskilln

# 設定ファイルのコピー
cp config.example.php config.php
```

### 3. Dify API設定
```php
// api.php または環境変数で設定
$difyConfig = [
    'api_key' => 'YOUR_DIFY_API_KEY',
    'base_url' => 'https://api.dify.ai/v1'
];
```

### 4. さくらサーバーでの設定
1. ファイルをアップロード
2. .htaccessファイルの設定（必要に応じて）
3. PHP設定の確認

## ディレクトリ構造

```
riskilln/
├── index.html              # メインページ
├── style.css               # スタイルシート
├── script.js               # JavaScript
├── api.php                 # APIエンドポイント
├── config.php              # 設定ファイル
├── config.example.php      # 設定例
├── assets/                 # 静的リソース
```

## API エンドポイント

### POST /api.php
チャットメッセージの送信

**リクエスト:**
```json
{
    "message": "ユーザーのメッセージ",
    "conversation_id": "会話ID（任意）",
    "conversation_count": 0
}
```

**レスポンス:**
```json
{
    "success": true,
    "message": "リスキルんの応答",
    "conversation_id": "会話ID",
    "conversation_count": 1,
    "is_final": false
}
```

## 使用方法

### 基本的な対話フロー
1. ユーザーが日常の悩みや「ぼやき」を入力
2. リスキルんが共感的に応答し、質問で内省を促進
3. 3-5ターンの対話を通じて自己理解を深める
4. 最終的に3つのスキルをハッシュタグ形式で提案

### スキル提案の例
```
今日の学びのハッシュタグ
#コミュニケーション #プレゼンテーション #自己理解
```

## カスタマイズ

### キャラクター設定の変更
`script.js`の以下の部分を編集：
```javascript
const CHARACTER_CONFIG = {
    name: 'リスキルん',
    emoji: '🐿️',
    suffix: 'ルン',
    personality: 'bright_and_positive'
};
```

### スキル一覧の編集
`api.php`のスキル配列を変更：
```php
$skillList = [
    'Python', 'データ分析', '生成AI', 'プレゼンテーション',
    'コミュニケーション', 'ロジカルシンキング',
    // 新しいスキルを追加
];
```

## デプロイ

### さくらサーバーでのデプロイ手順
1. ファイルマネージャーでファイルをアップロード
2. ドメインの設定
3. SSL証明書の設定（推奨）
4. .htaccessの設定：
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## セキュリティ

- XSS対策: ユーザー入力のサニタイズ
- CSRF対策: セッショントークン使用
- API キーの環境変数化
- HTTPS通信の強制

## ライセンス

MIT License - 詳細は [LICENSE](LICENSE) ファイルを参照

## 貢献

プロジェクトへの貢献を歓迎します！

1. フォークする
2. フィーチャーブランチを作成 (`git checkout -b feature/AmazingFeature`)
3. 変更をコミット (`git commit -m 'Add some AmazingFeature'`)
4. ブランチにプッシュ (`git push origin feature/AmazingFeature`)
5. プルリクエストを作成

## サポート & コミュニティ

- 📧 Email: support@riskilln.com
- 🐛 Issues: [GitHub Issues](https://github.com/your-repo/riskilln/issues)
- 📖 Documentation: [Wiki](https://github.com/your-repo/riskilln/wiki)

## 更新履歴

### v1.0.0 (2024-09-06)
- 初回リリース
- 基本的なチャット機能
- Dify API統合
- レスポンシブデザイン実装

---

**「嫌なことより好きなことから」学びを始めるきっかけを、リスキルんと一緒に見つけましょう！** 🐿️✨
