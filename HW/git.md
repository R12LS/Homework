## task1

```bash
git config --global user.name "vetisdod"
git config --global user.email "artiomsaleikin@gmail.com"
git config --global core.editor "nano"
git config --global color.ui auto
git config --list
```

## task2

```bash
mkdir papka 
cd papka
git init
git status
ls -la
```

## task3

```bash
echo "balls" > README.md
git add README.md
git commit -m "save"
git log
```

## task4

```bash
git branch
git branch new-feature
git switch new-feature
echo "baaals" > bigballs.txt
git add bigballs.txt
git commit -m "save"
```

## task5

```bash
git switch main
git merge new-feature
git branch -d new-feature
git log --oneline --graph 
```

## task6

```bash
git remote add origin https://github.com/R12LS/Homework.git
git push -u origin main
git status
```