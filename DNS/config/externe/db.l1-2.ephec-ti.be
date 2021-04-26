;
; BIND data file for local loopback interface
;
$ORIGIN l1-2.ephec-ti.be.
$TTL    604800
@       IN      SOA     ns.l1-2.ephec-ti.be. root.l1-2.ephec-ti.be. (
                              1         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL
;
@	IN	NS	ns.l1-2.ephec-ti.be.
@	IN	A	135.125.101.213
@	IN	MX	mail
ns	IN	A	135.125.101.213
wwww	IN	A	135.125.101.244
b2b	IN	CNAME	wwww
intranet	IN	CNAME	wwww
mail	IN	A	135.125.101.213
smtp 	IN	CNAME	mail
pop3	IN	CNAME	mail
smtp	IN	CNAME	mail
sip	IN	A	135.125.101.244