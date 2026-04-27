# 🚀 Kiera 자유 게시판 (Simple APM BBS)

> **리눅스 서버 관리 프로젝트** > Apache, PHP, MariaDB(APM) 환경에서 구축한 사용자 참여형 자유 게시판입니다.

---

## 🛠 Tech Stack

| Category | Technology |
| :--- | :--- |
| **OS** | Linux (CentOS / RHEL 기반) |
| **Server** | Apache (httpd) |
| **Database** | MariaDB |
| **Language** | PHP 8.x |
| **Deployment** | GitHub, DuckDNS |
| **Dev Tool** | VS Code, MacBook M4 Pro |

---

## 📋 주요 기능

* **회원가입 및 로그인**: 사용자 정보를 MariaDB에 저장하고 PHP 세션(Session)을 통한 인증 처리
* **게시글 작성**: 로그인한 사용자만 접근 가능한 작성 폼 및 데이터 정합성 검사
* **게시글 목록**: 메인 페이지에서 등록된 게시글을 역순으로 출력하는 실시간 목록 기능
* **보안 설정**: SELinux 보안 정책 대응 및 DB 접근 권한 최적화

---

## 🏗 프로젝트 구조

```text
Linux-homepage/
├── db.php      # 데이터베이스 연결 설정 (127.0.0.1 기반 TCP/IP 연결)
├── index.php   # 메인 게시판 목록 및 대문 화면
├── signup.php  # 신규 사용자 등록 로직
├── login.php   # 사용자 인증 및 세션 생성
├── logout.php  # 세션 파기 및 로그아웃 처리
└── write.php   # 게시글 작성 및 DB Insert 로직

---

## 💡 Troubleshooting (백엔드 핵심 포인트)
이번 프로젝트를 진행하며 발생한 주요 보안 이슈와 해결 과정을 기록합니다.

1. SELinux 보안 정책으로 인한 DB 연결 실패
  • 현상: setenforce 1 상태에서 PHP의 DB 접속이 차단됨 (Error 13: Permission denied).

  • 해결: 아파치 서버의 네트워크 연결 권한(httpd_can_network_connect_db)을 허용하여 해결.

2. Unix Socket vs TCP/IP 접속 방식의 차이
  • 현상: localhost 사용 시 내부 소켓 파일 접근 권한 이슈로 연결 실패.

  • 해결: DB 호스트 주소를 127.0.0.1로 변경하여 TCP/IP 통신 방식으로 우회, 보안 정책과 충돌 없이 안정적인 연결 확보.

---

## 🌐 서비스 접속 정보
• Domain: http://kiera-sm.duckdns.org

• Server IP: 202.31.245.145

---
Developed by J00n-oh Kwak (2026)
