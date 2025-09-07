# リスキルん画像配置ガイド

## 画像ファイルの配置

以下のディレクトリに、リスキルんの画像ファイルを配置してください：

```
assets/images/characters/
├── riskilln-main.png      # メインヒーロー画像（1枚目の画像）
├── riskilln-avatar.png    # チャットアバター画像（2枚目の画像）
├── riskilln-profile.png   # プロフィール画像（3枚目の画像）
└── riskilln-icon.png      # アイコン画像（2枚目の画像を小さくしたもの）
```

## 推奨画像サイズ

### riskilln-main.png
- **推奨サイズ**: 500x500px
- **用途**: ヒーローセクションのメイン画像
- **使用画像**: 1枚目（オフィスでアイデア電球を持つリス）

### riskilln-avatar.png
- **推奨サイズ**: 100x100px
- **用途**: チャットのアバター画像
- **使用画像**: 2枚目（虫眼鏡と電球を持つリス）

### riskilln-profile.png
- **推奨サイズ**: 200x200px
- **用途**: Aboutセクションのプロフィール画像
- **使用画像**: 3枚目（ビーチでアイデアを探すリス）

### riskilln-icon.png
- **推奨サイズ**: 50x50px
- **用途**: フッターのアイコン
- **使用画像**: 2枚目のリサイズ版

## 画像の最適化

### ファイル形式
- **PNG**: 透明度が必要な場合
- **WebP**: 高画質で軽量（モダンブラウザ対応）
- **JPEG**: 写真的な画像で透明度が不要な場合

### 圧縮
画像ファイルは以下のツールで圧縮することを推奨：
- TinyPNG (https://tinypng.com/)
- ImageOptim (Mac)
- GIMP
- Photoshop

## 配置手順

1. **FTPでアップロード**
   ```bash
   # さくらサーバーの場合
   ftp your-server.sakura.ne.jp
   cd /home/[username]/www/riskilln/assets/images/characters/
   put riskilln-main.png
   put riskilln-avatar.png
   put riskilln-profile.png
   put riskilln-icon.png
   ```

2. **ファイルマネージャーでアップロード**
   - さくらサーバーのコントロールパネル
   - ファイルマネージャー
   - `/assets/images/characters/` ディレクトリに画像をアップロード

3. **権限設定**
   ```bash
   chmod 644 *.png
   ```

## フォールバック設定

画像が読み込めない場合は、自動的に絵文字🐿️が表示されるように設定済みです。

## 動作確認

画像配置後、以下のURLで確認してください：
- メインページ: `https://yourdomain.com/`
- 画像直接アクセス: `https://yourdomain.com/assets/images/characters/riskilln-main.png`

## トラブルシューティング

### 画像が表示されない場合
1. ファイルパスの確認
2. ファイル権限の確認（644）
3. 画像ファイルの破損チェック
4. ブラウザキャッシュのクリア
