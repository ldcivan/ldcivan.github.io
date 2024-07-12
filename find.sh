#!/bin/bash

# 检查参数数量
if [ "$#" -lt 2 ]; then
    echo "Usage: \$0 <search_text> <directory> <replace_text (optional)>"
    exit 1
fi

# 获取参数
SEARCH_TEXT=\$1
DIRECTORY=${2:-.}
REPLACE_TEXT=\$3

# 查找并列出包含搜索文本的文件
find "$DIRECTORY" -type f \
  ! -path "*/.git/*" \
  ! -path "*/.gitignore" \
  ! -path "*/node_modules/*" \
  ! -path "*/.DS_Store" \
  -exec grep -Il "$SEARCH_TEXT" {} \; |
while read -r file; do
    echo "Found in: $file"
    if [ -n "$REPLACE_TEXT" ]; then
        # 使用 sed 替换文本
        #sed -i "s/$SEARCH_TEXT/$REPLACE_TEXT/g" "$file"
        echo "Replaced text in: $file"
    fi
done
