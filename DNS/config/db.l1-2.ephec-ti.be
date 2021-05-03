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
@	IN	NS	ns.l1-2.ephec-ti.be.
@	IN	A	135.125.101.213
@	IN	MX	10	mail
ns	IN	A	135.125.101.213
www	IN	A	135.125.101.244
b2b	IN	CNAME	www
intranet	IN	CNAME	www
mail	IN	A	135.125.101.213
smtp 	IN	CNAME	mail
pop3	IN	CNAME	mail
sip	IN	A	135.125.101.244
_sip._udp.l1-2.ephec-ti.be.    SRV 0 0 5060 sip
