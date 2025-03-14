### Cấu trúc thư mục dự án
## root
1. admin
    - controller
    - model
    - view
    - index.php
2. common // chứa file dùng chung cho cả dự án
3. img // folder lưu trữ file upload

// Dưới đây 4 5 6 7 thuộc về Client
4. controller
5. view
6. model
7. index.php

- không có thư mục client mà chỉ có thư mục admin vì mình không muốn trên url có /client nên đặt MVC của client trực tiếp trong root(thư mục gốc dự án)
- Admin có thư mục riêng với đầy đủ MVC để trên url có /admin
- Cấu hình cơ sở dữ liệu , biến môi trường trong common
