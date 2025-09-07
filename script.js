// シンプルなRiskill'n JavaScript

// スムーススクロール機能
function scrollToChat() {
    document.getElementById('chat').scrollIntoView({ behavior: 'smooth' });
}

// チャットメッセージを送信
function sendMessage(message) {
    addUserMessage(message);
    showLoading();
    
    // Dify APIに送信
    sendToDify(message);
}

// ユーザーの入力を送信
function sendUserMessage() {
    const input = document.getElementById('userInput');
    const message = input.value.trim();
    
    if (message) {
        sendMessage(message);
        input.value = '';
    }
}

// Enterキーでメッセージ送信
function handleKeyPress(event) {
    if (event.key === 'Enter') {
        sendUserMessage();
    }
}

// ユーザーメッセージを画面に追加
function addUserMessage(message) {
    const chatMessages = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message user-message';
    messageDiv.innerHTML = `
        <div class="message-content">
            <p>${message}</p>
        </div>
    `;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// ボットメッセージを画面に追加
function addBotMessage(message, hashtags = []) {
    const chatMessages = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message bot-message';
    
    let hashtagHtml = '';
    if (hashtags && hashtags.length > 0) {
        hashtagHtml = '<div style="margin-top: 10px;">';
        hashtags.forEach(tag => {
            hashtagHtml += `<span class="hashtag">#${tag}</span>`;
        });
        hashtagHtml += '</div>';
    }
    
    messageDiv.innerHTML = `
        <div class="message-content">
            <p>${message}</p>
            ${hashtagHtml}
        </div>
    `;
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// ローディング表示
function showLoading() {
    const chatMessages = document.getElementById('chatMessages');
    const loadingDiv = document.createElement('div');
    loadingDiv.className = 'message bot-message loading-message';
    loadingDiv.innerHTML = `
        <div class="message-content">
            <div class="loading">考えています...</div>
        </div>
    `;
    chatMessages.appendChild(loadingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// ローディングを削除
function removeLoading() {
    const loadingMessage = document.querySelector('.loading-message');
    if (loadingMessage) {
        loadingMessage.remove();
    }
}

// Dify APIにメッセージを送信
async function sendToDify(message) {
    try {
    const DIFy_API_URL = "https://api.dify.ai/v1/chat-messages"; // ベースURLは https://api.dify.ai/v1
        const API_KEY = "app-Gr4JaRLrQMv8Q1NabpQQhXC3";
        const response = await fetch(DIFy_API_URL, {
            method: "POST",
            headers: {
                "Authorization": `Bearer ${API_KEY}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                inputs: { message: message },
                response_mode: "blocking"
            })
        });
    const data = await response.json();
    console.log('dify API response:', data); // レスポンス内容を確認
        removeLoading();
        
        if (data && data.answer) {
            // レスポンスからハッシュタグを抽出
            const hashtags = extractHashtags(data.answer);
            const cleanMessage = data.answer.replace(/#\w+/g, '').trim();
            addBotMessage(cleanMessage, hashtags);
        } else {
            addBotMessage('申し訳ございません。エラーが発生しました。もう一度お試しください。');
        }
    } catch (error) {
        console.error('Error:', error);
        removeLoading();
        addBotMessage('接続エラーが発生しました。しばらく時間をおいてから再度お試しください。');
    }
}

// メッセージからハッシュタグを抽出
function extractHashtags(message) {
    const hashtagRegex = /#(\w+)/g;
    const hashtags = [];
    let match;
    
    while ((match = hashtagRegex.exec(message)) !== null) {
        hashtags.push(match[1]);
    }
    
    return hashtags;
}

// ページ読み込み時の初期化
document.addEventListener('DOMContentLoaded', function() {
    console.log('Riskill\'n チャットシステムが起動しました');
    
    // 初期メッセージにアニメーション効果を追加
    const initialMessage = document.querySelector('.bot-message');
    if (initialMessage) {
        initialMessage.style.opacity = '0';
        initialMessage.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            initialMessage.style.transition = 'all 0.5s ease';
            initialMessage.style.opacity = '1';
            initialMessage.style.transform = 'translateY(0)';
        }, 500);
    }
});