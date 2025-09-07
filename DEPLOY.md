# デプロイメントガイド

## さくらサーバーでのデプロイ手順

### 1. 事前準備
- さくらサーバーのコントロールパネルにアクセス
- PHP 7.4以上が有効になっていることを確認
- SSL証明書の設定（Let's Encryptまたは独自SSL）

### 2. ファイルのアップロード

#### FTPでのアップロード
```bash
# ローカルで圧縮
zip -r riskilln.zip * -x "*.git*" "node_modules/*" "*.log"

# FTPでアップロード後、サーバー上で解凍
unzip riskilln.zip
```

#### ファイルマネージャーでのアップロード
1. さくらのコントロールパネル → ファイルマネージャー
2. `/home/[アカウント名]/www/` にファイルをアップロード
3. 必要に応じてディレクトリ構造を調整

### 3. 設定ファイルの編集

#### config.phpの作成
```bash
cp config.example.php config.php
```

#### Dify API設定
config.phpファイルを編集し、実際のAPIキーを設定：
```php
'dify' => [
    'api_key' => 'app-your-actual-api-key',
    'base_url' => 'https://api.dify.ai/v1',
],
```

### 4. パーミッション設定
```bash
# ディレクトリパーミッション
chmod 755 /home/[アカウント名]/www/riskilln/
chmod 755 /home/[アカウント名]/www/riskilln/logs/ (作成する場合)

# ファイルパーミッション
chmod 644 *.html *.css *.js
chmod 644 *.php
chmod 600 config.php (セキュリティのため)
```

### 5. ドメイン設定

#### 独自ドメインの場合
1. コントロールパネル → ドメイン設定
2. 新しいドメインを追加
3. DocumentRootを `/home/[アカウント名]/www/riskilln/` に設定

#### サブドメインの場合
1. コントロールパネル → サブドメイン設定
2. 新しいサブドメインを作成
3. DocumentRootを適切に設定

### 6. SSL設明の設定

#### Let's Encryptの場合
1. コントロールパネル → SSL設定
2. Let's Encryptを選択
3. 対象ドメインを設定
4. 証明書を取得

#### .htaccessでHTTPS強制
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 7. 動作確認

#### 基本動作のテスト
1. `https://yourdomain.com/` にアクセス
2. チャット機能の動作確認
3. Dify APIの接続確認

#### ログの確認
```bash
# エラーログの確認
tail -f /home/[アカウント名]/www/logs/error.log

# アクセスログの確認
tail -f /home/[アカウント名]/www/logs/access.log
```

### 8. セキュリティ設定

#### ファイルアクセス制限
.htaccessで以下のファイルへのアクセスを制限：
- config.php
- *.log
- .git/* (開発環境から除外推奨)

#### PHP設定の確認
```php
// セキュリティ設定の確認
display_errors = Off (本番環境)
log_errors = On
error_log = /path/to/error.log
```

### 9. パフォーマンス最適化

#### Gzip圧縮の有効化
```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css application/javascript
</IfModule>
```

#### キャッシュ設定
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

### 10. バックアップ設定

#### 定期バックアップスクリプト
```bash
#!/bin/bash
# backup.sh
DATE=$(date +%Y%m%d_%H%M%S)
tar -czf /home/[アカウント名]/backup/riskilln_$DATE.tar.gz \
    /home/[アカウント名]/www/riskilln/
```

### トラブルシューティング

#### よくあるエラー

**500 Internal Server Error**
- .htaccessの設定を確認
- PHPのバージョンを確認
- ファイルパーミッションを確認

**API接続エラー**
- config.phpのAPI設定を確認
- cURL拡張モジュールの有効化を確認
- ファイアウォール設定を確認

**SSL証明書エラー**
- 証明書の有効期限を確認
- 中間証明書の設定を確認

#### ログの確認方法
```bash
# PHPエラーログ
tail -f /home/[アカウント名]/www/logs/php_errors.log

# さくらサーバーのエラーログ
tail -f /home/[アカウント名]/www/logs/error.log
```

### メンテナンス

#### 定期的なタスク
- SSL証明書の更新（Let's Encryptは自動更新）
- ログファイルのローテーション
- セキュリティアップデートの適用
- バックアップファイルの定期的なチェック

#### モニタリング
- サイトの稼働状況監視
- APIレスポンス時間の監視
- エラー率の監視

### パフォーマンス監視

#### 簡単な監視スクリプト
```bash
#!/bin/bash
# monitor.sh
URL="https://yourdomain.com/"
RESPONSE_TIME=$(curl -o /dev/null -s -w '%{time_total}' $URL)
echo "$(date): Response time: ${RESPONSE_TIME}s" >> monitor.log
```

この手順に従って、リスキルンのWebアプリケーションをさくらサーバーに正常にデプロイできます。
