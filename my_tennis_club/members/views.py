from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader
# Create your views here.
def members(request):
    template = loader.get_template('myfirst.html')
    # return HttpResponse("<h1>Hello world!</h1>") # http://127.0.0.1:8000/members abre isso
    return HttpResponse(template.render()) # http://127.0.0.1:8000/members abre/renderiza o conteúdo html