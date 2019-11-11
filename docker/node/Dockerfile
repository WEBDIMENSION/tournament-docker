FROM node:10

RUN mkdir -p /node
# アプリケーションディレクトリを作成する
WORKDIR /node

# アプリケーションの依存関係をインストールする
# ワイルドカードを使用して、package.json と package-lock.json の両方が確実にコピーされるようにします。
# 可能であれば (npm@5+)

COPY ./node /node

RUN npm install
#RUN node /opt/node/bin/node_server.js
# 本番用にコードを作成している場合
# RUN npm install --only=production

