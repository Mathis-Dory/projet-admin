;
; BIND data file for local loopback interface
;
$ORIGIN l1-2.ephec-ti.be.
$TTL    604800
@       IN      SOA     ns.l1-2.ephec-ti.be. admin.l1-2.ephec-ti.be. (
                              1         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL
; 
@	IN	NS	ns.l1-2.ephec-ti.be.  ; Zone NS
@	IN	A	135.125.101.213 ; Ip du VPS de Gabrielle pour le SOA
@	IN	MX	10	mail  ; priorite 10 le mx se base sur mail defini plus bas
ns	IN	A	135.125.101.213 ; Ip du VPS de Gabrielle pour le NS
www	IN	A	135.125.101.244 ; Ip du Vps d Eliott pour le serveur web
b2b	IN	CNAME	www ; alias pour serveur web
intranet	IN	CNAME	www ; alias pour serveur web
mail	IN	A	135.125.101.213 ; Ip du VPS de Gabrielle pour le service mail
smtp 	IN	CNAME	mail  ; alias de mail
pop3	IN	CNAME	mail  ; alias de mail
sip	IN	A	135.125.101.244 ; Ip du VPS d Eliott pour le service VOIP
_sip._udp.l1-2.ephec-ti.be.    SRV 0 0 5060 sip ; protocol sip sur UDP priorite 0 poid 0 port 5060
