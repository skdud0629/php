#!/bin/bash

# 1. 시스템 업데이트 및 패키지 설치
echo "🔧 PHP, Git, curl, unzip 설치 중..."
sudo apt update -y
sudo apt install -y php php-cli php-mbstring php-xml php-curl php-mysql unzip git

# 2. 프로젝트 디렉토리로 이동 (없으면 생성)
cd /home/ubuntu || exit

# 3. 기존 디렉토리 삭제 (선택 사항)
rm -rf php

# 4. GitHub에서 프로젝트 클론
echo "📥 GitHub에서 프로젝트 다운로드 중..."
git clone https://github.com/skdud0629/php.git

cd php || exit

# 5. PHP 내장 서버 실행 (포트 8000)
echo "🚀 PHP 내장 서버 실행 중 (http://<서버IP>:8000)"
php -S 0.0.0.0:8000
