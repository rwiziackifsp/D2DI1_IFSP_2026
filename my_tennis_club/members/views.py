from django.db.models import Q
from django.http import HttpResponse, HttpResponseRedirect
from django.template import loader
from django.urls import reverse
from .models import Member
from django.db.models import Q
from django.core.paginator import Paginator


# Create your views here.
def members(request):
    mymembers = Member.objects.all().values()
    template = loader.get_template('all_members.html')
    paginator = Paginator(mymembers, 5)
    page_number = request.GET.get('page')
    page_obj = paginator.get_page(page_number)
    context = {
        'mymembers': mymembers,
        "page_obj": page_obj,
    }
    return HttpResponse(template.render(context, request))

def details(request, id):
    mymember = Member.objects.get(id=id)
    template = loader.get_template('details.html')
    context = {
        'mymember': mymember,
    }
    return HttpResponse(template.render(context, request))

def busca(request):
    texto_busca = request.POST['busca']
    dados = Member.objects.filter(Q(first_name__icontains=texto_busca) | Q(last_name__icontains=texto_busca)).values()
    t = loader.get_template("all_members.html")
    context = {
        "mymembers": dados,
        "texto_busca": texto_busca,
        "qtd": len(dados),
    }
    return HttpResponse(t.render(context, request))

def main(request):
    template = loader.get_template('main.html')
    return HttpResponse(template.render())

def add(request):
    template = loader.get_template('add.html')
    return HttpResponse(template.render({}, request))

def addrecord(request):
    member = Member(first_name=request.POST['first_name'], last_name=request.POST['last_name'])
    member.save()
    return HttpResponseRedirect(reverse('members'))

def delete(request, id):
    member = Member.objects.get(id=id)
    member.delete()
    return HttpResponseRedirect(reverse('members'))

def update(request, id):
    mymember = Member.objects.get(id=id)
    template = loader.get_template('update.html')
    context = {
        'mymember': mymember,
    }
    return HttpResponse(template.render(context, request))


def updaterecord(request, id):
    member = Member.objects.get(id=id)
    member.first_name = request.POST['first_name']
    member.last_name = request.POST['last_name']
    member.save()
    return HttpResponseRedirect(reverse('members'))