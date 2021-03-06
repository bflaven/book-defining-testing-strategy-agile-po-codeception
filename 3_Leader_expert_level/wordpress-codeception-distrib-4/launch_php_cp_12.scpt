FasdUAS 1.101.10   ��   ��    k             l     ��������  ��  ��        l      �� 	 
��   	��*
 * This file is part of the book package: "Defining a test strategy for a P.O? 
 * Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
 * (c) Bruno Flaven <info@flaven.fr>
 * 
 * Intended to test a FRONTOFFICE and BACKOFFICE made with WP
 *
 * @package Codeception WordPress Testing 
 * @subpackage BACKOFFICE
 * @since Codeception 3.1.1, WordPress 5.2.3 
     
 �    * 
   *   T h i s   f i l e   i s   p a r t   o f   t h e   b o o k   p a c k a g e :   " D e f i n i n g   a   t e s t   s t r a t e g y   f o r   a   P . O ?   
   *   I n t r o d u c t i o n   t o   a   " t e s t i n g "   f r a m e w o r k   C O D E C E P T I O N _ .   U s e c a s e   w i t h   W o r d P r e s s . " 
   *   ( c )   B r u n o   F l a v e n   < i n f o @ f l a v e n . f r > 
   *   
   *   I n t e n d e d   t o   t e s t   a   F R O N T O F F I C E   a n d   B A C K O F F I C E   m a d e   w i t h   W P 
   * 
   *   @ p a c k a g e   C o d e c e p t i o n   W o r d P r e s s   T e s t i n g   
   *   @ s u b p a c k a g e   B A C K O F F I C E 
   *   @ s i n c e   C o d e c e p t i o n   3 . 1 . 1 ,   W o r d P r e s s   5 . 2 . 3   
        l     ��������  ��  ��        l     ����  r         m        �   � o p e n   - a   ' T e r m i n a l '   / V o l u m e s / m i _ d i s c o / _ t e c h n i c a l _ t r a i n i n g _ z a m b i a _ z n b c / 1 3 _ t e s t i n g _ w p / c o d e c e p t i o n - d i s t r i b - 4 /  o      ���� 0 my_path MY_PATH��  ��        l     ��������  ��  ��        l     ��  ��      set THEME to "Ocean"     �   *   s e t   T H E M E   t o   " O c e a n "      l    ����  r         m     ! ! � " "  H o m e b r e w   o      ���� 0 theme THEME��  ��     # $ # l    %���� % r     & ' & m    	 ( ( � ) )  p w d ' o      ���� 0 cmd_1 CMD_1��  ��   $  * + * l    ,���� , r     - . - m     / / � 0 0  p h p   - - v e r s i o n . o      ���� 0 cmd_2 CMD_2��  ��   +  1 2 1 l    3���� 3 r     4 5 4 m     6 6 � 7 7 B p h p   v e n d o r / b i n / c o d e c e p t   - - v e r s i o n 5 o      ���� 0 cmd_3 CMD_3��  ��   2  8 9 8 l    :���� : r     ; < ; m     = = � > > 
 c l e a r < o      ���� 0 cmd_4 CMD_4��  ��   9  ? @ ? l      �� A B��   A   do not use \n\n     B � C C "   d o   n o t   u s e   \ n \ n   @  D E D l    F���� F r     G H G m     I I � J J * e c h o   L A U N C H   T H E   S H E L L H o      ���� 0 cmd_5 CMD_5��  ��   E  K L K l     ��������  ��  ��   L  M N M l      �� O P��   O n h $set MY_SCRIPT to "php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature"     P � Q Q �   $ s e t   M Y _ S C R I P T   t o   " p h p   v e n d o r / b i n / c o d e c e p t   r u n   - - s t e p s   g h e r k i n   B a c k o f f i c e L o g i n A d m i n A d v a n c e d _ 1 . f e a t u r e "   N  R S R l    T���� T r     U V U m     W W � X X 0 s h   l a u n c h _ p h p _ c p _ g o o d . s h V o      ���� 0 	my_script 	MY_SCRIPT��  ��   S  Y Z Y l     ��������  ��  ��   Z  [ \ [ l     ��������  ��  ��   \  ]�� ] l    ^���� ^ Z     _ `�� a _ =    ) b c b n     ' d e d 1   # '��
�� 
prun e m     # f f�                                                                                      @ alis    4  MacaBubu                       BD ����Terminal.app                                                   ����            ����  
 cu             	Utilities   &/:Applications:Utilities:Terminal.app/    T e r m i n a l . a p p    M a c a B u b u  #Applications/Utilities/Terminal.app   / ��   c m   ' (��
�� boovtrue ` O   , � g h g k   2 � i i  j k j I  2 7�� l��
�� .sysoexecTEXT���     TEXT l o   2 3���� 0 my_path MY_PATH��   k  m n m r   8 I o p o 4   8 >�� q
�� 
tprf q o   < =���� 0 theme THEME p n       r s r 1   D H��
�� 
tcst s 4   > D�� t
�� 
cwin t m   B C����  n  u v u I  J X�� w x
�� .coredoscnull��� ��� ctxt w o   J K���� 0 cmd_1 CMD_1 x �� y��
�� 
kfil y 4   N T�� z
�� 
cwin z m   R S���� ��   v  { | { I  Y g�� } ~
�� .coredoscnull��� ��� ctxt } o   Y Z���� 0 cmd_2 CMD_2 ~ �� ��
�� 
kfil  4   ] c�� �
�� 
cwin � m   a b���� ��   |  � � � I  h v�� � �
�� .coredoscnull��� ��� ctxt � o   h i���� 0 cmd_3 CMD_3 � �� ���
�� 
kfil � 4   l r�� �
�� 
cwin � m   p q���� ��   �  � � � I  w ~�� ���
�� .sysodelanull��� ��� nmbr � m   w z���� ��   �  � � � I   ��� � �
�� .coredoscnull��� ��� ctxt � o    ����� 0 cmd_4 CMD_4 � �� ���
�� 
kfil � 4   � ��� �
�� 
cwin � m   � ����� ��   �  ��� � I  � ��� � �
�� .coredoscnull��� ��� ctxt � o   � ����� 0 	my_script 	MY_SCRIPT � �� ���
�� 
kfil � 4   � ��� �
�� 
cwin � m   � ����� ��  ��   h m   , / � ��                                                                                      @ alis    4  MacaBubu                       BD ����Terminal.app                                                   ����            ����  
 cu             	Utilities   &/:Applications:Utilities:Terminal.app/    T e r m i n a l . a p p    M a c a B u b u  #Applications/Utilities/Terminal.app   / ��  ��   a O   � � � � k   � � �  � � � I  � ��� ���
�� .sysoexecTEXT���     TEXT � o   � ����� 0 my_path MY_PATH��   �  � � � r   � � � � � 4   � ��� �
�� 
tprf � o   � ����� 0 theme THEME � n       � � � 1   � ���
�� 
tcst � 4   � ��� �
�� 
cwin � m   � �����  �  � � � I  � ��� � �
�� .coredoscnull��� ��� ctxt � o   � ����� 0 cmd_1 CMD_1 � �� ���
�� 
kfil � 4   � ��� �
�� 
cwin � m   � ����� ��   �  � � � I  � ��� � �
�� .coredoscnull��� ��� ctxt � o   � ����� 0 cmd_2 CMD_2 � �� ���
�� 
kfil � 4   � ��� �
�� 
cwin � m   � ����� ��   �  � � � I  � ��� � �
�� .coredoscnull��� ��� ctxt � o   � ����� 0 cmd_3 CMD_3 � �� ���
�� 
kfil � 4   � ��� �
�� 
cwin � m   � ����� ��   �  � � � I  � ��� ���
�� .sysodelanull��� ��� nmbr � m   � ����� ��   �  � � � I  ��� � �
�� .coredoscnull��� ��� ctxt � o   � ����� 0 cmd_4 CMD_4 � �� ���
�� 
kfil � 4   � �� �
� 
cwin � m   � ��~�~ ��   �  ��} � I �| � �
�| .coredoscnull��� ��� ctxt � o  �{�{ 0 	my_script 	MY_SCRIPT � �z ��y
�z 
kfil � 4  �x �
�x 
cwin � m  
�w�w �y  �}   � m   � � � ��                                                                                      @ alis    4  MacaBubu                       BD ����Terminal.app                                                   ����            ����  
 cu             	Utilities   &/:Applications:Utilities:Terminal.app/    T e r m i n a l . a p p    M a c a B u b u  #Applications/Utilities/Terminal.app   / ��  ��  ��  ��       �v � ��v   � �u
�u .aevtoappnull  �   � **** � �t ��s�r � ��q
�t .aevtoappnull  �   � **** � k     � �   � �   � �  # � �  * � �  1 � �  8 � �  D � �  R � �  ]�p�p  �s  �r   �   �  �o !�n (�m /�l 6�k =�j I�i W�h f�g�f�e�d�c�b�a�`�_�o 0 my_path MY_PATH�n 0 theme THEME�m 0 cmd_1 CMD_1�l 0 cmd_2 CMD_2�k 0 cmd_3 CMD_3�j 0 cmd_4 CMD_4�i 0 cmd_5 CMD_5�h 0 	my_script 	MY_SCRIPT
�g 
prun
�f .sysoexecTEXT���     TEXT
�e 
tprf
�d 
cwin
�c 
tcst
�b 
kfil
�a .coredoscnull��� ��� ctxt�` 
�_ .sysodelanull��� ��� nmbr�q�E�O�E�O�E�O�E�O�E�O�E�O�E�O�E�Oa a ,e  va  l�j O*a �/*a k/a ,FO�a *a k/l O�a *a k/l O�a *a k/l Oa j O�a *a k/l O�a *a k/l UY sa  l�j O*a �/*a k/a ,FO�a *a k/l O�a *a k/l O�a *a k/l Oa j O�a *a k/l O�a *a k/l U ascr  ��ޭ