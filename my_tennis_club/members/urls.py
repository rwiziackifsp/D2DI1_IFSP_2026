from django.urls import path
from . import views

# members > new > file > urls.py

# para adicionar os padrões de caminho de URLs
urlpatterns = [
    path('',views.main,name='main'),
    path('members/',views.members,name='members'),
    path('members/details/<int:id>',views.details,name='details'),
]