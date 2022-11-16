<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:ss="http://www.w3.org/1999/xhtml">

    <xsl:template match="/">
        <html>
            <body>
                <table border="1">
                    <tr bgcolor="#9acd32"></tr>
                    <th>Host</th>
                    <th>Address</th>
                    </table>
                <xsl:for-each select="nmaprun/hostname">
                    <tr>
                        <td><xsl:value-of select="host->addressp->addr"/></td>
                        <td><xsl:value-of select="addr"/></td>
                    </tr>
                </xsl:for-each>
                </body>
            </html>
        </xsl:template>
    </xsl:stylesheet>

