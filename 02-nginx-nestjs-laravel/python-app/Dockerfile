# /python-app/Dockerfile
FROM python:3.9-slim

# Встановлюємо залежності
WORKDIR /app
COPY requirements.txt requirements.txt
RUN pip install -r requirements.txt

# Копіюємо всі файли
COPY . .

# Запускаємо Flask-додаток
CMD ["python", "app.py"]