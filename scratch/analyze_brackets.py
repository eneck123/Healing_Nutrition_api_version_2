from pathlib import Path

text = Path('database/seeders/ModerateObesitySeeder.php').read_text(encoding='utf-8')
lines = text.splitlines()

balance = 0
max_balance = 0
max_line = 0
for i, line in enumerate(lines, start=1):
    j = 0
    state = 'code'
    while j < len(line):
        ch = line[j]
        nxt = line[j+1] if j + 1 < len(line) else ''
        if state == 'code':
            if ch == '/' and nxt == '/':
                break
            if ch == '/' and nxt == '*':
                state = 'block_comment'
                j += 2
                continue
            if ch == "'" and (j == 0 or line[j-1] != '\\'):
                state = 'single_quote'
                j += 1
                continue
            if ch == '"' and (j == 0 or line[j-1] != '\\'):
                state = 'double_quote'
                j += 1
                continue
            if ch == '[':
                balance += 1
                if balance > max_balance:
                    max_balance = balance
                    max_line = i
            elif ch == ']':
                balance -= 1
            j += 1
        elif state == 'block_comment':
            if ch == '*' and nxt == '/':
                state = 'code'
                j += 2
            else:
                j += 1
        elif state == 'single_quote':
            if ch == '\\' and j + 1 < len(line):
                j += 2
                continue
            if ch == "'" and (j == 0 or line[j-1] != '\\'):
                state = 'code'
            j += 1
        elif state == 'double_quote':
            if ch == '\\' and j + 1 < len(line):
                j += 2
                continue
            if ch == '"' and (j == 0 or line[j-1] != '\\'):
                state = 'code'
            j += 1

print('final_balance=', balance)
print('max_balance=', max_balance, 'at_line=', max_line)
