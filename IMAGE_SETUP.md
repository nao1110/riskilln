# リスキルん画像設定ガイド

## 📁 画像ディレクトリ構造

```
/assets/images/characters/
├── Riskill'n.png          # メインロゴ画像
├── riskilln1.jpg          # ヒーローセクション用キャラクター画像
├── riskilln2.jpg          # チャットヘッダー用アバター画像
├── riskilln3.jpg          # チャットメッセージ用アバター画像
├── riskilln4.jpg          # Aboutセクション用プロフィール画像
└── riskilln5.jpg          # 追加キャラクター画像（予備）
```

## 🖼️ 画像仕様

### メインロゴ (Riskill'n.png)
- **推奨サイズ**: 300x300px以上
- **フォーマット**: PNG（透明背景推奨）
- **用途**: ヘッダーロゴ、フッターロゴ
- **特徴**: 円形表示対応、グリーンカラー基調

### キャラクター画像 (riskilln1.jpg〜riskilln5.jpg)
- **推奨サイズ**: 400x400px以上
- **フォーマット**: JPG または PNG
- **アスペクト比**: 1:1（正方形）
- **用途**: 
  - riskilln1.jpg: ヒーローセクションのメインキャラクター
  - riskilln2.jpg: チャットヘッダーのアバター
  - riskilln3.jpg: チャットメッセージのアバター
  - riskilln4.jpg: Aboutセクションのプロフィール
  - riskilln5.jpg: 予備/将来の拡張用

## 🔧 画像配置手順

### 1. フォルダ作成（既存の場合はスキップ）
```bash
mkdir -p assets/images/characters
```

### 2. 画像ファイルのアップロード
以下のファイルを `assets/images/characters/` にアップロードしてください：

1. **Riskill'n.png** - 提供されたロゴ画像
2. **riskilln1.jpg** - キャラクター画像1
3. **riskilln2.jpg** - キャラクター画像2  
4. **riskilln3.jpg** - キャラクター画像3
5. **riskilln4.jpg** - キャラクター画像4
6. **riskilln5.jpg** - キャラクター画像5（任意）

### 3. ファイル名の確認
アップロード後、以下のパスでアクセスできることを確認してください：
- `assets/images/characters/Riskill'n.png`
- `assets/images/characters/riskilln1.jpg`
- `assets/images/characters/riskilln2.jpg`
- `assets/images/characters/riskilln3.jpg`
- `assets/images/characters/riskilln4.jpg`

## 🎨 表示確認ポイント

### ✅ チェックリスト
- [ ] ヘッダーロゴが正しく表示される
- [ ] ヒーローセクションのキャラクターが表示される
- [ ] チャットアバターが表示される
- [ ] Aboutセクションのプロフィール画像が表示される
- [ ] フッターロゴが表示される
- [ ] 画像が円形にクロップされて表示される
- [ ] ホバー効果が正常に動作する

### 🚨 トラブルシューティング

#### 画像が表示されない場合
1. **ファイルパスの確認**
   - ファイル名の大文字小文字をチェック
   - 特殊文字（`'`など）が正しく使用されているかチェック

2. **ファイル権限の確認**
   ```bash
   chmod 644 assets/images/characters/*
   ```

3. **画像形式の確認**
   - サポートされている形式: JPG, PNG, WebP
   - ファイルが破損していないかチェック

#### 画像が正しく表示されない場合
1. **キャッシュのクリア**
   - ブラウザのキャッシュをクリア
   - スーパーリロード（Ctrl+F5 / Cmd+Shift+R）

2. **画像サイズの最適化**
   ```bash
   # ImageMagickを使用した画像リサイズ例
   convert input.jpg -resize 400x400^ -gravity center -extent 400x400 output.jpg
   ```

## 🔄 画像更新時の注意事項

### 画像交換手順
1. 新しい画像をアップロード
2. 古い画像をバックアップ
3. ブラウザキャッシュをクリア
4. 表示確認

### パフォーマンス最適化
- 画像圧縮を推奨（TinyPNG、ImageOptimなど）
- WebP形式の併用も可能
- 高解像度表示用の2x画像も用意可能

## 💡 代替手段

画像ファイルが用意できない場合、以下の代替表示が設定されています：
- ロゴ → 🐿️ 絵文字
- キャラクター → 🐿️ 絵文字

## 📞 サポート

画像設定でお困りの場合は、以下を確認してください：
1. このドキュメントのトラブルシューティング
2. ブラウザの開発者ツールでエラーメッセージを確認
3. サーバーのエラーログを確認

---

**注意**: すべての画像は著作権を確認の上、適切なライセンスで使用してください。
