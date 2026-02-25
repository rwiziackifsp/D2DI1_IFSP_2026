from django.urls import path
from . import views

# members > new > file > urls.py

# para adicionar os padrões de caminho de URLs
urlpatterns = [
    path('members/',views.members,name='members'),
]