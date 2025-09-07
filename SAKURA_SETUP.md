# さくらサーバー設定ガイド

## 1. 設定ファイルの準備

### config.phpの作成
```bash
cp config.example.php config.php
```

## 2. さくらサーバー情報の設定

### config.phpで編集する項目

#### 🌸 FTP設定
```php
'ftp' => [
    'host' => 'YOUR_DOMAIN.sakura.ne.jp',        // さくらサーバーのFTPホスト
    'username' => 'your_ftp_username',           // FTPユーザー名
    'password' => 'your_ftp_password',           // FTPパスワード
],
```

#### 🌸 サーバー情報
```php
'server' => [
    'domain' => 'your-domain.com',               // 独自ドメインまたは初期ドメイン
    'subdomain' => '',                           // サブドメイン（例：'app'）
    'document_root' => '/home/YOUR_ACCOUNT/www/', // ドキュメントルート
],
```

#### 🌸 データベース設定（使用する場合）
```php
'database' => [
    'host' => 'mysql123.db.sakura.ne.jp',       // DBホスト名
    'name' => 'your_db_name',                    // データベース名
    'username' => 'your_db_user',               // DBユーザー名
    'password' => 'your_db_password',            // DBパスワード
],
```

## 3. さくらサーバーでの設定確認方法

### コントロールパネルで確認する情報

1. **サーバー情報**
   - サーバーパネル > サーバー情報
   - FTPホスト名をメモ

2. **ドメイン設定**
   - ドメイン/SSL > ドメイン/SSL設定
   - 使用するドメインを確認

3. **データベース設定**
   - データベース > データベースの設定
   - データベース名、ユーザー名、ホスト名を確認

4. **PHP設定**
   - スクリプト設定 > PHP設定
   - PHPバージョンを確認・変更

## 4. 環境変数での設定（推奨）

本番環境では環境変数を使用することを推奨します：

```bash
# .envファイル（ルートディレクトリに作成）
SAKURA_FTP_HOST=your-domain.sakura.ne.jp
SAKURA_FTP_USER=your_ftp_username
SAKURA_FTP_PASS=your_ftp_password
SAKURA_DOMAIN=your-domain.com
SAKURA_DB_HOST=mysql123.db.sakura.ne.jp
SAKURA_DB_NAME=your_db_name
SAKURA_DB_USER=your_db_user
SAKURA_DB_PASS=your_db_password
DIFY_API_KEY=app-your-dify-api-key
```

## 5. セキュリティ設定

### 必須のセキュリティ対策

1. **config.phpの保護**
```apache
# .htaccessファイルに追加
<Files "config.php">
    Order allow,deny
    Deny from all
</Files>
```

2. **ディレクトリブラウジングの無効化**
```apache
Options -Indexes
```

3. **SSL/HTTPS強制**
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## 6. トラブルシューティング

### よくある問題と解決方法

1. **FTP接続エラー**
   - ホスト名の確認
   - ユーザー名・パスワードの確認
   - ポート番号の確認（通常は21）

2. **PHPエラー**
   - PHPバージョンの確認
   - エラーログの確認

3. **データベース接続エラー**
   - ホスト名の確認
   - データベース名・ユーザー名の確認
   - 接続許可設定の確認

## 7. デプロイ後の確認

### 動作確認チェックリスト

- [ ] サイトが正常に表示される
- [ ] Dify APIとの通信が正常
- [ ] チャット機能が動作する
- [ ] 画像が正しく表示される
- [ ] SSL証明書が有効
- [ ] レスポンシブデザインが機能する

## サポート

設定でお困りの場合は：
- さくらサーバーサポート: https://support.sakura.ad.jp/
- 公式マニュアル: https://help.sakura.ad.jp/
