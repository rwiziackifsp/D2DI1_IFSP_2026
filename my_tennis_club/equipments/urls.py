from django.urls import path
from . import views

urlpatterns = [
    path('equipments/',views.equipments,name='equipments'),
    path('equipments/details/<int:id>',views.details,name='details_eqt'),
]