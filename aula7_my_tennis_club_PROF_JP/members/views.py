from multiprocessing import context

from django.core.paginator import Paginator
from django.db.models import Q
from django.http import HttpResponse, HttpResponseRedirect
from django.template import loader
from django.urls import reverse
from members.models import Member
from plans.models import Plan


def members(request):
    mymembers = Member.objects.all().values()
    template = loader.get_template("all_members.html")

    paginator = Paginator(mymembers, 2)
    page_number = request.GET.get('page')
    page_obj = paginator.get_page(page_number)

    context = {
        "page_obj": page_obj,
    }
    return HttpResponse(template.render(context, request))

def details(request, id):
    mymember = Member.objects.get(id=id)
    template = loader.get_template("details.html")
    context = {
        "mymember": mymember,
    }
    return HttpResponse(template.render(context, request))

def main(request):
    template = loader.get_template("main.html")
    return HttpResponse(template.render())

def add(request):
    myplans = Plan.objects.all().values()
    template = loader.get_template("add.html")
    context = {
        'myplans': myplans
    }
    return HttpResponse(template.render(context, request))

def addrecord(request):
    x = request.POST['first']
    y = request.POST['last']
    z = Plan.objects.filter(id=request.POST['plan']).first()
    member = Member(firstname=x, lastname=y, plan=z)
    member.save()
    return HttpResponseRedirect(reverse('members'))

def delete(request, id):
    member = Member.objects.get(id=id)
    member.delete()
    return HttpResponseRedirect(reverse('members'))

def update(request, id):
    mymember = Member.objects.get(id=id)
    myplans = Plan.objects.all().values()
    template = loader.get_template('update.html')
    context = {
        "mymember": mymember,
        "myplans": myplans,
    }
    return HttpResponse(template.render(context, request))

def updaterecord(request, id):
    first = request.POST['first']
    last = request.POST['last']
    plan = request.POST['plan']
    member = Member.objects.get(id=id)
    member.firstname = first
    member.lastname = last
    member.plan = Plan.objects.get(id=plan)
    member.save()
    return HttpResponseRedirect(reverse('members'))

def busca(request):
    texto_busca = request.POST['busca']
    dados = Member.objects.filter(
        Q(firstname__contains=texto_busca) | Q(lastname__contains=texto_busca)
    ).values()
    t = loader.get_template('all_members.html')
    context = {
        'mymembers': dados,
        'texto_busca': texto_busca,
        'qtd': len(dados),
    }
    return HttpResponse(t.render(context, request))