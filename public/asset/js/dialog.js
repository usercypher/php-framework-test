function newE(t,c,s){var e=document.createElement(t);e.className=c;e.textContent=s;return e}function Dialog(o){var dA=newE('div','d-a');dA.setDialogActivityClass=function(dAC){if(dAC){dA.className='d-a '+dAC}};var d=newE('div','d');dA.setDialogClass=function(dC){if(dC){d.className='d '+dC}};var dH=newE('div','d-h');var t=newE('h1','d-t',o.t.s);dH.appendChild(t);dA.setTitleText=function(tT){t.textContent=tT};dA.setTitleClass=function(tC){if(tC){t.className='d-t '+tC}};var m=newE('p','d-m',o.m.s);dA.setMessageText=function(mT){m.textContent=mT};dA.setMessageClass=function(mC){if(mC){m.className='d-m '+mC}};var dF=newE('div','d-f');if(o.oB){var oB=newE('button',o.oB.c,o.oB.s);dF.appendChild(oB);oB.onclick=function(){if(o.oO&&oB){o.oO()}dA.classList.remove('show')};dA.setConfirmText=function(oBT){oB.textContent=oBT};dA.setConfirmClass=function(oBC){if(oBC){oB.className=o.oB.c+' '+oBC}}}if(o.cB){var cB=newE('button',o.cB.c,o.cB.s);dF.appendChild(cB);cB.onclick=function(){dA.classList.remove('show')};dA.setCancelText=function(cBT){cB.textContent=cBT};dA.setCancelClass=function(cBC){if(cBC){cB.className=o.cB.c+' '+cBC}}}if(o.s){var s=newE('div',o.s.c);dF.appendChild(s);dA.setSpinnerClass=function(sC){if(sC){s.className=o.s.c+' '+sC}}}d.appendChild(dH);d.appendChild(m);d.appendChild(dF);dA.appendChild(d);document.body.appendChild(dA);dA.show=function(){dA.classList.remove('show');setTimeout(function(){dA.classList.add('show')},0)};return dA}function MessageDialog(){var d=Dialog({t:{s:'Message'},m:{s:'Some message'},cB:{c:'m-d-c-b',s:'x'}});return d}function ConfirmDialog(callback){var d=Dialog({t:{s:'Confirm'},m:{s:'Are you sure?'},oB:{c:'c-d-o-b',s:'YES'},cB:{c:'c-d-c-b',s:'NO'},oO:callback});return d}function ProgressDialog(){var d=Dialog({t:{s:'Processing'},m:{s:'Processing...'},s:{c:'p-d-s'}});return d}window.MessageDialog=MessageDialog;window.ConfirmDialog=ConfirmDialog;window.ProgressDialog=ProgressDialog;